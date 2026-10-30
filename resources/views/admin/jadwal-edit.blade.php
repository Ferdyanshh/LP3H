@extends('layouts.app')

@section('title', 'Edit Jadwal - Pelatihan Pendamping Proses Produk Halal (PPH)')

@section('content')
<div class="container mx-auto px-8 py-20">
    <h1 class="text-3xl font-semibold text-center text-gray-900 mb-6">Edit Jadwal Pelatihan</h1>

    <div class="bg-white p-8 rounded-xl shadow-lg mt-6">
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Form Edit Jadwal</h2>

        <form method="POST" action="{{ route('edit_jadwal.update', $jadwal) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tanggal" class="block text-sm text-gray-600">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="w-full px-4 py-2 border-2 border-gray-300 rounded-md"
                       value="{{ old('tanggal', $jadwal->tanggal->format('Y-m-d')) }}" required>
            </div>
            <div class="mb-4">
                <label for="waktu" class="block text-sm text-gray-600">Waktu</label>
                <input type="time" id="waktu" name="waktu" class="w-full px-4 py-2 border-2 border-gray-300 rounded-md"
                       value="{{ old('waktu', $jadwal->waktu) }}" required>
            </div>
            <div class="mb-4">
                <label for="kegiatan" class="block text-sm text-gray-600">Kegiatan</label>
                <input type="text" id="kegiatan" name="kegiatan" class="w-full px-4 py-2 border-2 border-gray-300 rounded-md"
                       value="{{ old('kegiatan', $jadwal->kegiatan) }}" required>
            </div>
            <div class="mb-4">
                <label for="pic_narasumber" class="block text-sm text-gray-600">PIC/Narasumber</label>
                <input type="text" id="pic_narasumber" name="pic_narasumber" class="w-full px-4 py-2 border-2 border-gray-300 rounded-md"
                       value="{{ old('pic_narasumber', $jadwal->pic_narasumber) }}" required>
            </div>

            <button type="submit" class="px-6 py-3 bg-purple-700 text-white rounded-full hover:bg-purple-800 transition-all">Update Jadwal</button>
            <a href="{{ route('jadwal') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </form>
    </div>
</div>
@endsection
