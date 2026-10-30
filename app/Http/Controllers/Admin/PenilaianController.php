<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PenilaianController extends Controller
{
    public function index(): View
    {
        return view('admin.penilaian', [
            'tugasList' => Tugas::where('status', Tugas::STATUS_MENUNGGU)
                ->orderBy('tanggal_submit')
                ->get(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'tugas_id' => ['required', 'integer', 'exists:tugas,id'],
            'status' => ['required', Rule::in([Tugas::STATUS_APPROVED, Tugas::STATUS_REJECTED])],
            'alasan' => ['nullable', 'string', 'max:1000'],
        ]);

        $tugas = Tugas::findOrFail($data['tugas_id']);
        $tugas->status = $data['status'];

        if ($data['status'] === Tugas::STATUS_REJECTED && ! empty($data['alasan'])) {
            $tugas->catatan_tambahan = $data['alasan'];
        }

        $tugas->save();

        return redirect()->route('penilaian')->with('success', 'Status tugas berhasil diperbarui.');
    }
}
