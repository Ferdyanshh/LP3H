<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UjiPraktikController extends Controller
{
    private const FILE_FIELDS = [
        'dokumenNIB' => 'dokumen_nib',
        'dokumenSJPH' => 'dokumen_sjph',
        'screenshotOSS' => 'screenshot_oss',
        'screenshotSiHalal' => 'screenshot_sihalal',
        'laporanTugas' => 'laporan_tugas',
    ];

    public function create(): View
    {
        return view('uji_praktik.input-tugas');
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'namaPendamping' => ['required', 'string', 'max:255'],
            'emailPendamping' => ['required', 'email', 'max:255'],
            'nomorHP' => ['nullable', 'string', 'max:15'],
            'namaPerusahaan' => ['nullable', 'string', 'max:255'],
            'bidangUsaha' => ['nullable', 'string', 'max:255'],
            'jenisTugas' => ['nullable', 'string', 'max:255'],
            'deskripsiTugas' => ['nullable', 'string'],
            'kendala' => ['nullable', 'string'],
            'catatanTambahan' => ['nullable', 'string'],
        ];
        foreach (array_keys(self::FILE_FIELDS) as $field) {
            $rules[$field] = ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'];
        }

        $data = $request->validate($rules);

        $tugas = [
            'nama_pendamping' => $data['namaPendamping'],
            'email_pendamping' => $data['emailPendamping'],
            'nomor_hp' => $data['nomorHP'] ?? null,
            'nama_perusahaan' => $data['namaPerusahaan'] ?? null,
            'bidang_usaha' => $data['bidangUsaha'] ?? null,
            'jenis_tugas' => $data['jenisTugas'] ?? null,
            'deskripsi_tugas' => $data['deskripsiTugas'] ?? null,
            'kendala' => $data['kendala'] ?? null,
            'catatan_tambahan' => $data['catatanTambahan'] ?? null,
            'status' => Tugas::STATUS_MENUNGGU,
            'user_id' => $request->user()->id,
        ];

        foreach (self::FILE_FIELDS as $field => $kolom) {
            if ($request->hasFile($field)) {
                $tugas[$kolom] = $request->file($field)->store('tugas', 'public');
            }
        }

        Tugas::create($tugas);

        return redirect()
            ->route('input_tugas')
            ->with('success', 'Tugas berhasil dikirim dan sedang menunggu verifikasi.');
    }
}
