<?php

use App\Http\Controllers\Admin\EvaluasiController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\UjiPraktikController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.index')->name('index');
Route::view('/tentang', 'pages.tentang')->name('tentang');
Route::view('/layanan', 'pages.layanan')->name('layanan');
Route::view('/kontak', 'pages.kontak')->name('kontak');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('daftar');
    Route::post('/daftar', [AuthController::class, 'register'])->name('daftar.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout_user');

    Route::middleware('role:peserta')->group(function () {
        Route::view('/module', 'modul.index')->name('module');
        Route::view('/module1', 'modul.modul1')->name('module1');
        Route::view('/module2', 'modul.modul2')->name('module2');
        Route::view('/module3', 'modul.modul3')->name('module3');

        Route::get('/pre-test', [TesController::class, 'show'])->defaults('jenis', 'pre')->name('pre_test');
        Route::get('/post-test', [TesController::class, 'show'])->defaults('jenis', 'post')->name('post_test');
        Route::post('/submit_pre_test', [TesController::class, 'submit'])->defaults('jenis', 'pre')->name('submit_pre_test');
        Route::post('/submit_post_test', [TesController::class, 'submit'])->defaults('jenis', 'post')->name('submit_post_test');

        Route::view('/uji-praktik', 'uji_praktik.index')->name('uji_praktik');
        Route::view('/katalog-bahan', 'uji_praktik.katalog-bahan')->name('katalog_bahan');
        Route::view('/daftar-kbli', 'uji_praktik.daftar-kbli')->name('daftar_kbli');
        Route::view('/pelatihan-nib', 'uji_praktik.pelatihan-nib')->name('pelatihan_nib');
        Route::view('/pelatihan-sihalal', 'uji_praktik.pelatihan-sihalal')->name('pelatihan_sihalal');
        Route::get('/input-tugas', [UjiPraktikController::class, 'create'])->name('input_tugas');
        Route::post('/input-tugas', [UjiPraktikController::class, 'store'])->name('input_tugas.store');

        Route::view('/kontak-us', 'peserta.kontak')->name('kontak_us');

        Route::prefix('simulasi/sihalal')->name('simulasi.sihalal.')->group(function () {
            Route::view('/login', 'simulasi.sihalal.login')->name('login');
            Route::view('/daftar', 'simulasi.sihalal.daftar')->name('daftar');
            Route::view('/verifikasi', 'simulasi.sihalal.verifikasi')->name('verifikasi');
            Route::view('/onboarding/asal', 'simulasi.sihalal.onboarding.asal')->name('onboarding.asal');
            Route::view('/onboarding/nib', 'simulasi.sihalal.onboarding.nib')->name('onboarding.nib');
            Route::view('/onboarding/data', 'simulasi.sihalal.onboarding.data')->name('onboarding.data');
            Route::view('/dashboard', 'simulasi.sihalal.dashboard')->name('dashboard');
        });
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/evaluasi', EvaluasiController::class)->name('evaluasi');

        Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
        Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::get('/edit-jadwal/{jadwal}', [JadwalController::class, 'edit'])->name('edit_jadwal');
        Route::put('/edit-jadwal/{jadwal}', [JadwalController::class, 'update'])->name('edit_jadwal.update');
        Route::delete('/hapus-jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('hapus_jadwal');

        Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian');
        Route::post('/update_tugas_status', [PenilaianController::class, 'update'])->name('update_tugas_status');
    });
});
