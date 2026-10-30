@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-8 py-20">

    <div class="bg-white rounded-xl shadow-2xl p-10 mb-10">
        <div class="flex items-center gap-8">
            <div class="w-24 h-24 bg-purple-600 text-white rounded-full flex items-center justify-center text-3xl font-semibold">
                {{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}
            </div>
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Selamat Datang, {{ $user->name }}!</h1>
                <p class="text-xl text-gray-700">Kami senang Anda bergabung dengan kami. Semoga pelatihan ini bermanfaat untuk Anda.</p>
            </div>
        </div>
    </div>

    <h2 id="jadwal-pelatihan" class="text-2xl font-semibold text-gray-800 mb-4">Jadwal Pelatihan</h2>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-purple-700 text-white">
                <tr>
                    <th class="border p-4 text-left">Tanggal</th>
                    <th class="border p-4 text-left">Waktu</th>
                    <th class="border p-4 text-left">Kegiatan</th>
                    <th class="border p-4 text-left">PIC/Narasumber</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwalList as $jadwal)
                    <tr class="border-b">
                        <td class="border p-4">{{ $jadwal->tanggal->format('Y-m-d') }}</td>
                        <td class="border p-4">{{ $jadwal->waktu }}</td>
                        <td class="border p-4">{{ $jadwal->kegiatan }}</td>
                        <td class="border p-4">{{ $jadwal->pic_narasumber }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border p-4 text-center text-gray-500">Belum ada jadwal.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <section class="mt-20">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            {{ $user->isAdmin() ? 'Daftar Semua Tugas' : 'Daftar Tugas Anda' }}
        </h2>

        @if ($tugasList->isNotEmpty())
            <div class="overflow-x-auto bg-white rounded-xl shadow-lg p-6">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-300">
                            <th class="p-3 text-left font-semibold text-gray-700">Jenis Tugas</th>
                            <th class="p-3 text-left font-semibold text-gray-700">Status</th>
                            <th class="p-3 text-left font-semibold text-gray-700">Tanggal Submit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tugasList as $tugas)
                            @php
                                $warna = match ($tugas->status) {
                                    'menunggu' => 'text-yellow-600',
                                    'approved' => 'text-green-600',
                                    'rejected' => 'text-red-600',
                                    default => 'text-gray-600',
                                };
                            @endphp
                            <tr class="border-b border-gray-300 hover:bg-gray-50">
                                <td class="p-3">{{ $tugas->jenis_tugas }}</td>
                                <td class="p-3 uppercase font-semibold {{ $warna }}">{{ $tugas->status }}</td>
                                <td class="p-3">{{ $tugas->tanggal_submit?->format('d M Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600 italic">Anda belum memiliki data tugas.</p>
        @endif
    </section>
</div>
@endsection
