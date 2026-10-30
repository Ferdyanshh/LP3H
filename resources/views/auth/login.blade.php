@extends('layouts.guest')

@section('title', 'Login - Pelatihan Pendamping Proses Produk Halal (PPH)')

@section('content')
<div class="container mx-auto px-8 py-20">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-center text-gray-900 text-4xl font-bold mb-6">Login</h1>

        <form action="{{ route('login.attempt') }}" method="POST" class="bg-white rounded-xl shadow-lg p-10">
            @csrf

            <div class="mb-6">
                <label for="email" class="block text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@mail.com"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required autofocus>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm text-gray-600">Password</label>
                <input type="password" id="password" name="password" placeholder="********"
                       class="w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
            </div>

            <div class="mb-6">
                <button type="submit" class="w-full px-6 py-3 bg-purple-700 text-white rounded-full hover:bg-purple-800 transition-all font-medium">
                    Login
                </button>
            </div>

            <p class="text-center text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('daftar') }}" class="text-purple-600 hover:text-purple-700">Daftar di sini</a>
            </p>
        </form>
    </div>
</div>
@endsection
