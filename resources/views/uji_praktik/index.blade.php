@extends('layouts.app')

@section('title', 'Uji Praktik')

@push('styles')
<style>
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }
</style>
@endpush

@section('content')
<div class="container mx-auto px-8 py-20">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-gray-900 text-4xl font-bold mb-6">Uji Praktik</h1>
            <p class="text-gray-700 leading-relaxed mb-8">
                Dashboard Tugas Praktik untuk Pendamping Halal
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <button onclick="window.location.href='{{ route('katalog_bahan') }}'" class="menu-item bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all hover:-translate-y-1 text-left">
                    <div class="w-16 h-16 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                    </div>
                    <h3 class="text-[#02033b] text-xl mb-2">Katalog Bahan Halal</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Daftar bahan-bahan yang halal dan haram untuk digunakan dalam produksi
                    </p>
                </button>

                <button onclick="window.location.href='{{ route('daftar_kbli') }}'" class="menu-item bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all hover:-translate-y-1 text-left">
                    <div class="w-16 h-16 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                    </div>
                    <h3 class="text-[#02033b] text-xl mb-2">Daftar KBLI</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Klasifikasi Baku Lapangan Usaha Indonesia untuk pendaftaran
                    </p>
                </button>

                <button onclick="window.location.href='{{ route('pelatihan_nib') }}'" class="menu-item bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all hover:-translate-y-1 text-left">
                    <div class="w-16 h-16 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                    </div>
                    <h3 class="text-[#02033b] text-xl mb-2">Pelatihan Pembuatan NIB</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Panduan lengkap step-by-step pembuatan NIB di sistem OSS
                    </p>
                </button>

                <button onclick="window.location.href='{{ route('pelatihan_sihalal') }}'" class="menu-item bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all hover:-translate-y-1 text-left">
                    <div class="w-16 h-16 rounded-xl bg-orange-100 text-orange-700 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6l8 12 8-12H4z" />
                        </svg>
                    </div>
                    <h3 class="text-[#02033b] text-xl mb-2">Pelatihan SiHalal</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Panduan pendaftaran dan penggunaan sistem SiHalal
                    </p>
                </button>

                <button onclick="window.location.href='{{ route('input_tugas') }}'" class="menu-item bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all hover:-translate-y-1 text-left">
                    <div class="w-16 h-16 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6l8 12 8-12H4z" />
                        </svg>
                    </div>
                    <h3 class="text-[#02033b] text-xl mb-2">Form Tugas Praktik</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Upload hasil tugas praktik untuk diverifikasi oleh admin
                    </p>
                </button>

            </div>

            <div id="katalog-halal" class="section">

                <h2 class="text-2xl font-bold">Katalog Bahan Halal</h2>
                <p>Daftar bahan-bahan yang halal dan haram untuk digunakan dalam produksi...</p>
            </div>

            <div id="kbli" class="section">

                <h2 class="text-2xl font-bold">Daftar KBLI</h2>
                <p>Klasifikasi Baku Lapangan Usaha Indonesia untuk pendaftaran...</p>
            </div>

            <div id="nib" class="section">

                <h2 class="text-2xl font-bold">Pelatihan Pembuatan NIB</h2>
                <p>Panduan step-by-step pembuatan NIB di sistem OSS...</p>
            </div>

            <div id="sihalal" class="section">

                <h2 class="text-2xl font-bold">Pelatihan SiHalal</h2>
                <p>Panduan pendaftaran dan penggunaan sistem SiHalal...</p>
            </div>

            <div id="tugas" class="section">

                <h2 class="text-2xl font-bold">Input Tugas Praktik</h2>
                <p>Upload dan submit hasil tugas praktik untuk verifikasi admin...</p>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
        function changePage(pageId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            const selectedSection = document.getElementById(pageId);
            if (selectedSection) {
                selectedSection.classList.add('active');
            }
        }
</script>
@endpush
