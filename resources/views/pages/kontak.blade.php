@extends('layouts.guest')

@section('title', 'Kontak Pelatihan Pendamping Proses Produk Halal (PPH)')

@section('content')

    <main>
        <div class="container mx-auto px-8 py-20">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-gray-900 text-4xl font-bold mb-6">Hubungi Kami</h1>
                <p class="text-gray-700 leading-relaxed mb-8">
                    Untuk pertanyaan lebih lanjut, Anda dapat menghubungi kami melalui kontak berikut:
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-gray-900 text-xl font-semibold mb-4">Social Media</h2>
                        <p class="text-gray-700">@@lp3h.telkomuniv</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-gray-900 text-xl font-semibold mb-4">Email</h2>
                        <p class="text-gray-700">coesmartmsme@gmail.com</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-gray-900 text-xl font-semibold mb-4">Whatsapp</h2>
                        <p class="text-gray-700">081226712870</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-gray-900 text-xl font-semibold mb-4">Alamat</h2>
                        <p class="text-gray-700">Jalan Telekomunikasi</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
