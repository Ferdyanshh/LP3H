<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JadwalController extends Controller
{
    private function rules(): array
    {
        return [
            'tanggal' => ['required', 'date'],
            'waktu' => ['required', 'string', 'max:255'],
            'kegiatan' => ['required', 'string', 'max:255'],
            'pic_narasumber' => ['required', 'string', 'max:255'],
        ];
    }

    public function index(): View
    {
        return view('admin.jadwal', [
            'jadwalList' => Jadwal::orderBy('tanggal')->orderBy('waktu')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Jadwal::create($request->validate($this->rules()));

        return redirect()->route('jadwal')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit(Jadwal $jadwal): View
    {
        return view('admin.jadwal-edit', ['jadwal' => $jadwal]);
    }

    public function update(Request $request, Jadwal $jadwal): RedirectResponse
    {
        $jadwal->update($request->validate($this->rules()));

        return redirect()->route('jadwal')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy(Jadwal $jadwal): RedirectResponse
    {
        $jadwal->delete();

        return redirect()->route('jadwal')->with('success', 'Jadwal berhasil dihapus!');
    }
}
