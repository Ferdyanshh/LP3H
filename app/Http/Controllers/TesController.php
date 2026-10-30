<?php

namespace App\Http\Controllers;

use App\Models\TestResult;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TesController extends Controller
{
    public function show(string $jenis): View
    {
        $soal = config('soal.soal');

        return view('tes.show', [
            'jenis' => $jenis,
            'label' => $jenis === 'pre' ? 'Pre-Test' : 'Post-Test',
            'soal' => $soal,
            'skorMaks' => collect($soal)->sum('poin'),
        ]);
    }

    public function submit(Request $request, string $jenis): JsonResponse
    {
        $soal = config('soal.soal');
        $kolom = $jenis === 'pre' ? 'pre_test_score' : 'post_test_score';

        $skor = 0;
        foreach ($soal as $no => $item) {
            if ($request->input("q{$no}") === $item['kunci']) {
                $skor += $item['poin'];
            }
        }

        TestResult::updateOrCreate(
            ['user_id' => $request->user()->id],
            [$kolom => $skor]
        );

        return response()->json([
            'status' => 'success',
            'score' => $skor,
            'max' => collect($soal)->sum('poin'),
        ]);
    }
}
