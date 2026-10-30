@extends('layouts.guest')

@section('title', 'Pelatihan Pendamping Proses Produk Halal (PPH)')

@section('content')

    <main>
        <div class="container mx-auto px-8 py-20">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="space-y-6">
                        <h1 class="text-gray-900 leading-tight text-4xl font-bold">
                            Pelatihan Pendamping Proses Produk Halal (PPH)
                        </h1>

                        <p class="text-gray-700 max-w-xl leading-relaxed">
                            Pelatihan Pendamping Proses Produk Halal (PPH) merupakan program yang bertujuan untuk membekali peserta dengan pengetahuan dan keterampilan dalam mendampingi pelaku usaha mikro dan kecil dalam proses sertifikasi halal. Pelatihan ini dirancang sesuai dengan regulasi yang ditetapkan oleh Badan Penyelenggara Jaminan Produk Halal (BPJPH) dan mencakup berbagai aspek terkait standar halal, prosedur sertifikasi, serta praktik pendampingan yang efektif.
                        </p>

                        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-yellow-400 text-gray-900 rounded-full hover:bg-yellow-500 transition-colors shadow-md hover:shadow-lg">
                            Daftar Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path d="M12.293 7.293a1 1 0 0 0 0 1.414L14.586 10H4a1 1 0 0 0 0 2h10.586l-2.293 2.293a1 1 0 1 0 1.414 1.414l4-4a1 1 0 0 0 0-1.414l-4-4a1 1 0 1 0-1.414 1.414z"/>
                            </svg>
                        </a>
                    </div>

                    <div class="flex justify-center lg:justify-end">
                        <div class="bg-white rounded-3xl shadow-xl p-12 flex items-center justify-center">
                            <img src="{{ asset('img/Logo-Halal.png') }}" alt="HALAL Indonesia Logo" class="w-64 h-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
