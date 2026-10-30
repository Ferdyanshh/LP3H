<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withInput($request->only('email'))
            ->with('danger', 'Email atau password salah.');
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:20'],
            'pendidikan_terakhir' => ['required', 'string', 'max:100'],
            'pekerjaan' => ['required', 'string', 'max:100'],
            'ktp' => ['required', 'file', 'mimes:pdf', 'max:2048'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $ktpPath = $request->file('ktp')->store('ktp');

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'alamat' => $data['alamat'],
            'no_telp' => $data['no_telp'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir'],
            'pekerjaan' => $data['pekerjaan'],
            'ktp_path' => $ktpPath,
        ]);
        $user->role = 'peserta';
        $user->save();

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
