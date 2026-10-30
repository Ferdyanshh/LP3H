@extends('layouts.guest')

@section('title', 'Daftar - Pelatihan Pendamping Proses Produk Halal (PPH)')

@section('content')
<div class="container mx-auto px-8 py-20">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-center text-gray-900 text-4xl font-bold mb-6">Daftar Akun</h1>

        <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-lg p-10">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm text-gray-600">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <label for="alamat" class="block text-sm text-gray-600">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <label for="no_telp" class="block text-sm text-gray-600">Nomor Telpon</label>
                <input type="tel" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" placeholder="Nomor Telpon"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <label for="pendidikan_terakhir" class="block text-sm text-gray-600">Pendidikan Terakhir</label>
                <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}" placeholder="Pendidikan Terakhir"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <label for="pekerjaan" class="block text-sm text-gray-600">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Pekerjaan"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <label for="ktp" class="block text-sm text-gray-600">Upload KTP (Bersifat Rahasia)</label>
                <input type="file" id="ktp" name="ktp" accept=".pdf"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"
                       required>
                <p class="mt-1 text-xs text-gray-500">Hanya menerima file format .pdf (maks. 2 MB)</p>
            </div>

            <div class="mb-6">
                <label for="email" class="block text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@mail.com"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm text-gray-600">Password</label>
                <input type="password" id="password" name="password" placeholder="Minimal 8 karakter"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm text-gray-600">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <button type="submit" class="w-full px-6 py-3 bg-purple-700 text-white rounded-full hover:bg-purple-800 transition-all font-medium">
                    Daftar
                </button>
            </div>

            <p class="text-center text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-700">Login di sini</a>
            </p>
        </form>
    </div>
</div>
@endsection
