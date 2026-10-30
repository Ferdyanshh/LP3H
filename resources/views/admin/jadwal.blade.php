@extends('layouts.app')

@section('title', 'Jadwal Pelatihan')

@section('content')
<div class="container mx-auto px-8 py-10">
    <div class="mb-8">
        <h1 class="text-gray-900 text-4xl md:text-5xl font-bold mb-4">Jadwal Pelatihan</h1>
        <p class="text-gray-600">
            Kelola jadwal pelatihan untuk peserta Pendamping Proses Produk Halal (PPH)
        </p>
    </div>

    <form method="POST" action="{{ route('jadwal.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="date" name="tanggal" value="{{ old('tanggal') }}" required class="border p-2 rounded">
            <input type="time" name="waktu" value="{{ old('waktu') }}" placeholder="Waktu" required class="border p-2 rounded">
            <input type="text" name="kegiatan" value="{{ old('kegiatan') }}" placeholder="Kegiatan" required class="border p-2 rounded">
            <input type="text" name="pic_narasumber" value="{{ old('pic_narasumber') }}" placeholder="PIC/Narasumber" required class="border p-2 rounded">
        </div>
        <button type="submit" class="mt-4 px-6 py-2 bg-purple-700 text-white rounded-full hover:bg-purple-800 transition-all">Tambah Jadwal</button>
    </form>

    <div class="overflow-x-auto mt-10 bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-purple-700 text-white">
                <tr>
                    <th class="border p-4 text-left">Tanggal</th>
                    <th class="border p-4 text-left">Waktu</th>
                    <th class="border p-4 text-left">Kegiatan</th>
                    <th class="border p-4 text-left">PIC/Narasumber</th>
                    <th class="border p-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwalList as $jadwal)
                    <tr class="border-b">
                        <td class="border p-4">{{ $jadwal->tanggal->format('Y-m-d') }}</td>
                        <td class="border p-4">{{ $jadwal->waktu }}</td>
                        <td class="border p-4">{{ $jadwal->kegiatan }}</td>
                        <td class="border p-4">{{ $jadwal->pic_narasumber }}</td>
                        <td class="border p-4">
                            <a href="{{ route('edit_jadwal', $jadwal) }}" class="text-blue-500 hover:underline">Edit</a> |

                            <form method="POST" action="{{ route('hapus_jadwal', $jadwal) }}" class="inline"
                                  onsubmit="return confirm('Hapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border p-4 text-center text-gray-500">Belum ada jadwal.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
