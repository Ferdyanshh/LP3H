@extends('layouts.app')

@section('title', 'Pelatihan SiHalal - FRI Finance')

@push('styles')
<style>

        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 10px;
        }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">

            <div class="mb-12">
                <button onClick="window.history.back()" class="flex items-center gap-2 text-purple-600 font-bold text-sm uppercase tracking-wider hover:text-purple-800 transition-all mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Dashboard
                </button>
                <h1 class="text-gray-900 text-4xl md:text-5xl font-bold mb-4">Pelatihan SiHalal</h1>
                <p class="text-gray-600 text-lg leading-relaxed max-w-3xl">
                    Panduan lengkap pendaftaran sertifikasi halal melalui Sistem Informasi Halal
                </p>
            </div>

        <section class="bg-green-50 border border-green-200 rounded-2xl p-8 mb-10 max-w-3xl mx-auto">
            <h2 class="flex items-center gap-2 text-green-800 text-xl font-semibold mb-4">
                Apa itu SiHalal?
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </h2>
            <p class="text-green-700 leading-relaxed mb-4">
                SiHalal (Sistem Informasi Halal) adalah platform online yang dikelola oleh BPJPH (Badan Penyelenggara Jaminan Produk Halal) untuk pendaftaran dan pengelolaan sertifikasi halal produk. Sistem ini memudahkan pelaku usaha untuk:
            </p>
            <ul class="list-disc list-inside text-green-800 font-medium text-sm space-y-1 max-w-sm">
                <li>Mendaftarkan produk untuk sertifikasi halal</li>
                <li>Memantau status permohonan sertifikasi</li>
                <li>Mengunduh sertifikat halal yang telah terbit</li>
                <li>Memperpanjang sertifikat yang akan habis masa berlaku</li>
            </ul>
        </section>

        <section class="max-w-3xl mx-auto space-y-6 mb-14 overflow-y-auto max-h-[550px] scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">1</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Akses Portal SiHalal</h3>
                    <p class="text-gray-600 text-sm">Buka website <a href="https://halal.go.id" target="_blank" class="text-green-600 underline">halal.go.id</a> menggunakan browser<br />Pastikan koneksi internet stabil untuk proses yang lancar</p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">2</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Registrasi Akun Pelaku Usaha</h3>
                    <p class="text-gray-600 text-sm">Klik menu "Daftar" dan pilih "Pelaku Usaha"<br />Siapkan NIB, email aktif, dan nomor telepon yang dapat dihubungi</p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">3</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Lengkapi Data Perusahaan</h3>
                    <p class="text-gray-600 text-sm">Isi informasi perusahaan meliputi nama, alamat, dan jenis usaha<br />Data harus sesuai dengan dokumen NIB dan dokumen resmi lainnya</p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">4</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Input Data Produk</h3>
                    <p class="text-gray-600 text-sm italic">
                        Masukkan informasi produk yang akan disertifikasi halal<br/>
                        <span class="not-italic font-normal">Cantumkan nama produk, kategori, dan komposisi bahan</span>
                    </p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">5</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Upload Dokumen SJPH</h3>
                    <p class="text-gray-600 text-sm italic">
                        Upload Surat Jaminan Produk Halal (SJPH) dan dokumen pendukung<br/>
                        <span class="not-italic font-normal">Format PDF, maksimal 5MB. Pastikan dokumen jelas dan terbaca</span>
                    </p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">6</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Isi Form Bahan Produk</h3>
                    <p class="text-gray-600 text-sm italic">
                        Lengkapi daftar semua bahan baku dan bahan tambahan yang digunakan<br/>
                        <span class="not-italic font-normal">Sertakan nama supplier dan status kehalalan bahan</span>
                    </p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">7</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Upload Proses Produksi</h3>
                    <p class="text-gray-600 text-sm italic">
                        Upload dokumen flowchart proses produksi<br/>
                        <span class="not-italic font-normal">Gambarkan alur produksi dari bahan baku hingga produk jadi</span>
                    </p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">8</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Pilih LPH (Lembaga Pemeriksa Halal)</h3>
                    <p class="text-gray-600 text-sm italic">
                        Pilih LPH yang akan melakukan pemeriksaan/audit<br/>
                        <span class="not-italic font-normal">Pilih LPH yang terdekat atau sesuai rekomendasi</span>
                    </p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">9</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Submit Permohonan</h3>
                    <p class="text-gray-600 text-sm italic">
                        Periksa kembali semua data dan dokumen, lalu submit<br/>
                        <span class="not-italic font-normal">Catat nomor registrasi untuk tracking status permohonan</span>
                    </p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">10</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Proses Verifikasi</h3>
                    <p class="text-gray-600 text-sm italic">
                        Tunggu proses verifikasi dari BPJPH dan audit dari LPH<br/>
                        <span class="not-italic font-normal">Pantau status secara berkala melalui dashboard SiHalal</span>
                    </p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">11</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Sidang Fatwa MUI</h3>
                    <p class="text-gray-600 text-sm italic">
                        Jika lolos audit, permohonan akan dibawa ke sidang fatwa MUI<br/>
                        <span class="not-italic font-normal">Proses ini dapat memakan waktu beberapa minggu</span>
                    </p>
                </div>
            </article>

            <article class="flex gap-6 items-start rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-600 text-white font-bold text-lg flex-shrink-0">12</div>
                <div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-1">Terbitkan Sertifikat</h3>
                    <p class="text-gray-600 text-sm italic">
                        Setelah disetujui, sertifikat halal dapat diunduh dari sistem<br />
                        <span class="not-italic font-normal">Sertifikat berlaku selama 4 tahun dan dapat diperpanjang</span>
                    </p>
                </div>
            </article>
        </section>

        <section class="max-w-5xl mx-auto px-6 py-12 space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-orange-50 border-2 border-orange-500 rounded-lg p-6 text-orange-700 font-medium text-sm leading-relaxed">
            <h3 class="font-semibold mb-3">Dokumen yang Diperlukan:</h3>
            <ul class="list-disc list-inside space-y-1">
                <li>NIB (Nomor Induk Berusaha)</li>
                <li>SJPH (Surat Jaminan Produk Halal)</li>
                <li>Daftar bahan dan supplier</li>
                <li>Flowchart proses produksi</li>
                <li>Manual sistem jaminan halal</li>
                <li>Daftar produk dan foto produk</li>
            </ul>
            </div>

            <div class="bg-purple-50 border-2 border-purple-600 rounded-lg p-6 text-purple-700 font-medium text-sm leading-relaxed">
            <h3 class="font-semibold mb-3">Estimasi Waktu Proses:</h3>
            <ul class="list-disc list-inside space-y-1">
                <li><span class="font-normal text-purple-800">Verifikasi dokumen:</span> 1-2 minggu</li>
                <li><span class="font-normal text-purple-800">Audit LPH:</span> 2-4 minggu</li>
                <li><span class="font-normal text-purple-800">Sidang fatwa MUI:</span> 2-4 minggu</li>
                <li><span class="font-normal text-purple-800">Penerbitan sertifikat:</span> 1 minggu</li>
                <li class="font-semibold mt-1">Total: 2-3 bulan</li>
            </ul>
            </div>

        </div>

        <div class="bg-red-50 border-2 border-red-500 rounded-lg p-6 text-red-700 font-medium text-sm leading-relaxed">
            <h3 class="font-semibold mb-3">Catatan Penting:</h3>
            <ul class="list-disc list-inside space-y-1">
            <li>Sertifikat halal berlaku selama 4 tahun</li>
            <li>Perpanjangan dapat dilakukan 3 bulan sebelum masa berlaku habis</li>
            <li>Jika terjadi perubahan komposisi/proses, harus melaporkan ke BPJPH</li>
            <li>Produk yang sudah bersertifikat harus mencantumkan logo halal resmi</li>
            </ul>
        </div>

        </section>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
            <a href="{{ route('simulasi.sihalal.login') }}"
                class="inline-flex items-center gap-3 px-8 py-4 bg-purple-700 hover:bg-purple-800 text-white font-semibold rounded-full shadow-lg transition transform hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-purple-300">
                Coba Simulasi SiHalal
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
            </a>
            <a href="https://halal.go.id" target="_blank" rel="noopener noreferrer"
                class="inline-flex items-center gap-3 px-8 py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-full shadow-lg transition transform hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-green-300">
                Kunjungi Portal SiHalal
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                </svg>
            </a>
        </div>

    </main>
@endsection
