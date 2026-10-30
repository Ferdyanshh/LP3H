<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class EvaluasiController extends Controller
{
    public function __invoke(): View
    {
        $peserta = User::where('role', '!=', 'admin')
            ->with('testResult')
            ->orderBy('name')
            ->get();

        return view('admin.evaluasi', [
            'peserta' => $peserta,
            'kkm' => config('soal.kkm'),
        ]);
    }
}
