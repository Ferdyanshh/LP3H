@extends('layouts.app')

@section('title', 'Penilaian Tugas Praktik')

@push('styles')
<style>
    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .animate-fade-in {
        animation-name: fade-in;
        animation-timing-function: ease-in-out;
        animation-fill-mode: forwards;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto space-y-8 px-6 sm:px-12 mt-12 pb-12">
    <div class="mb-8">
        <h1 class="text-gray-900 text-4xl md:text-5xl font-bold mb-4">Penilaian Tugas Praktik</h1>
        <p class="text-gray-600">
            Verifikasi dan penilaian tugas praktik yang diajukan oleh pendamping halal
        </p>
    </div>

    @forelse ($tugasList as $tugas)
        <div class="bg-white rounded-3xl shadow-lg border border-gray-200 p-8 hover:shadow-xl transition-shadow duration-300">
            <div class="flex justify-between items-start">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $tugas->nama_pendamping }}</h2>

                @php
                    [$label, $kelas] = match ($tugas->status) {
                        'menunggu' => ['Menunggu', 'bg-yellow-100 text-yellow-800'],
                        'approved' => ['Disetujui', 'bg-green-100 text-green-800'],
                        'rejected' => ['Ditolak', 'bg-red-100 text-red-800'],
                        default => [$tugas->status, 'bg-gray-100 text-gray-700'],
                    };
                @endphp
                <span class="px-4 py-1 rounded-full text-sm uppercase font-semibold {{ $kelas }} select-none whitespace-nowrap drop-shadow">
                    {{ $label }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 text-gray-700 leading-relaxed">
                <div>
                    <p><strong>Email Pendamping:</strong> {{ $tugas->email_pendamping }}</p>
                    <p><strong>Nomor HP:</strong> {{ $tugas->nomor_hp }}</p>
                    <p><strong>Nama Perusahaan:</strong> {{ $tugas->nama_perusahaan }}</p>
                    <p><strong>Bidang Usaha:</strong> {{ $tugas->bidang_usaha }}</p>
                </div>
                <div>
                    <p><strong>Jenis Tugas:</strong> {{ $tugas->jenis_tugas }}</p>
                    <p><strong>Deskripsi Tugas:</strong> {{ $tugas->deskripsi_tugas }}</p>
                    <p><strong>Kendala:</strong> {{ $tugas->kendala ?: '-' }}</p>
                    <p><strong>Catatan Tambahan:</strong> {{ $tugas->catatan_tambahan ?: '-' }}</p>
                    <p><strong>Tanggal Submit:</strong> {{ $tugas->tanggal_submit?->format('d M Y H:i') }}</p>
                </div>
            </div>

            <div class="mb-6">
                <p class="font-semibold text-gray-800 mb-3">Dokumen Terlampir:</p>
                <div class="flex flex-wrap gap-3">
                    @forelse ($tugas->lampiran() as $path)
                        <a href="{{ Storage::disk('public')->url($path) }}" target="_blank" rel="noopener"
                           class="inline-block px-5 py-2 bg-blue-50 border border-blue-300 text-blue-700 rounded-full text-sm font-medium hover:bg-blue-100 transition">
                            {{ basename($path) }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    @empty
                        <span class="text-gray-500 text-sm">Tidak ada lampiran.</span>
                    @endforelse
                </div>
            </div>

            <form action="{{ route('update_tugas_status') }}" method="POST" class="flex flex-wrap gap-4 items-center">
                @csrf
                <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
                <input type="text" name="alasan" placeholder="Alasan penolakan (isi jika tolak)"
                       class="flex-grow min-w-[280px] border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                <button type="submit" name="status" value="approved"
                        class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow-md">
                    Setujui
                </button>
                <button type="submit" name="status" value="rejected"
                        class="bg-red-600 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition shadow-md">
                    Tolak
                </button>
            </form>
        </div>
    @empty
        <p class="text-center text-gray-500 mt-10">Tidak ada tugas menunggu verifikasi.</p>
    @endforelse
</div>
@endsection
