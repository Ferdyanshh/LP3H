@extends('layouts.guest')

@section('title', 'Layanan Pelatihan Pendamping Proses Produk Halal (PPH)')

@section('content')

    <main>
        <div class="container mx-auto px-8 py-20">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-gray-900 text-4xl font-bold mb-6">Layanan Kami</h1>
                <p class="text-gray-700 leading-relaxed mb-8">
                    Kami menyediakan berbagai layanan dalam rangka mendukung pelaku usaha mikro dan kecil untuk memperoleh sertifikat halal dan memahami proses sertifikasi halal dengan baik. Berikut adalah layanan yang kami tawarkan:
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-gray-900 text-xl font-semibold mb-4">Pelatihan Halal</h2>
                        <p class="text-gray-700">Pelatihan ini memberikan pengetahuan tentang proses sertifikasi halal dan standar halal yang diterapkan di Indonesia.</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-gray-900 text-xl font-semibold mb-4">Sertifikasi</h2>
                        <p class="text-gray-700">Kami membantu pelaku usaha dalam mempersiapkan semua yang diperlukan untuk proses sertifikasi halal, termasuk pendampingan langsung.</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-gray-900 text-xl font-semibold mb-4">Konsultasi</h2>
                        <p class="text-gray-700">Kami menyediakan layanan konsultasi bagi pelaku usaha untuk mempermudah pemahaman proses sertifikasi halal dan persiapannya.</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-gray-900 text-xl font-semibold mb-4">Pendampingan</h2>
                        <p class="text-gray-700">Pendampingan langsung dalam proses sertifikasi halal untuk memastikan usaha kecil dan mikro memenuhi standar yang ditetapkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
