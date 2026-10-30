@extends('layouts.app')

@section('title', 'Modul Pelatihan')

@push('styles')
<style>

        .module-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
</style>
@endpush

@section('content')
<div class="container mx-auto px-8 py-20">
        <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-12">Module Pelatihan</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            <div class="bg-white rounded-xl shadow-lg transition-transform duration-300 module-card hover:transform hover:scale-105">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Module 1: Proses Produk Halal</h2>
                    <p class="text-gray-600 mt-2 mb-4">Berisi Tentang Pengenalan Jaminan Produk Halal dan Regulasi</p>
                    <a href="{{ str_replace(' ', '%20', asset('pdf/Proses Produk Halal_Self-Declare_LP3H Telkom University_3-4 Mei 2025.pdf')) }}"
                       class="inline-block px-6 py-2 bg-purple-600 text-white rounded-full hover:bg-purple-700 transition-all"
                       target="_blank">Lihat Modul</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg transition-transform duration-300 module-card hover:transform hover:scale-105">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Module 2: Pengetahuan Bahan</h2>
                    <p class="text-gray-600 mt-2 mb-4">Berisi Tentang Pengetahuan Bahan Pangan Halal</p>
                    <a href="{{ str_replace(' ', '%20', asset('pdf/PENGETAHUAN BAHAN.pdf')) }}"
                       class="inline-block px-6 py-2 bg-purple-600 text-white rounded-full hover:bg-purple-700 transition-all"
                       target="_blank">Lihat Modul</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg transition-transform duration-300 module-card hover:transform hover:scale-105">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Module 3: Pendampingan P3H</h2>
                    <p class="text-gray-600 mt-2 mb-4">Berisi Tentang Pendampingan Proses Produk Halal</p>
                    <a href="{{ str_replace(' ', '%20', asset('pdf/Pendampingan Pendamping P3H.pdf')) }}"
                       class="inline-block px-6 py-2 bg-purple-600 text-white rounded-full hover:bg-purple-700 transition-all"
                       target="_blank">Lihat Modul</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg transition-transform duration-300 module-card hover:transform hover:scale-105">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Module 4: Ketentuan Syariat Islam JPH</h2>
                    <p class="text-gray-600 mt-2 mb-4">Berisi Tentang Ketentuan Syariat Islam dalam Jaminan Produk Halal</p>
                    <a href="{{ str_replace(' ', '%20', asset('pdf/Ketentuan Syariat Islam JPH_Guskus-2025.pdf')) }}"
                       class="inline-block px-6 py-2 bg-purple-600 text-white rounded-full hover:bg-purple-700 transition-all"
                       target="_blank">Lihat Modul</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg transition-transform duration-300 module-card hover:transform hover:scale-105">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Module 5: Materi Regulasi JPH</h2>
                    <p class="text-gray-600 mt-2 mb-4">Berisi Tentang Materi Regulasi Jaminan Produk Halal</p>
                    <a href="{{ str_replace(' ', '%20', asset('pdf/Materi Regulasi JPH LP3H TelU ver4.pdf')) }}"
                       class="inline-block px-6 py-2 bg-purple-600 text-white rounded-full hover:bg-purple-700 transition-all"
                       target="_blank">Lihat Modul</a>
                </div>
            </div>
        </div>

        <div class="mt-16 flex items-center gap-12 justify-center">
            <img src="{{ asset('img/halal-indonesia.jpg') }}" alt="Halal Indonesia" class="w-72 h-auto rounded-xl shadow-lg">
            <div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Memahami Dasar Regulasi Jaminan Produk Halal</h3>
                <p class="text-gray-700">
                    Dalam module ini, Anda akan mempelajari tentang pengenalan regulasi dan standar yang digunakan untuk menjamin produk halal. Kami akan menjelaskan prosedur yang perlu dilalui oleh UMKM dalam memenuhi regulasi halal yang berlaku.
                </p>
            </div>
        </div>
    </div>
@endsection
