<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $jadwalList = Jadwal::orderBy('tanggal')->orderBy('waktu')->get();

        $tugasList = $user->isAdmin()
            ? Tugas::latest('tanggal_submit')->get()
            : $user->tugas()->latest('tanggal_submit')->get();

        return view('dashboard', [
            'user' => $user,
            'jadwalList' => $jadwalList,
            'tugasList' => $tugasList,
        ]);
    }
}
