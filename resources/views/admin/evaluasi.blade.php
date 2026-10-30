@extends('layouts.app')

@section('title', 'Evaluasi Peserta - Pelatihan Pendamping Proses Produk Halal (PPH)')

@section('content')
<div class="container mx-auto px-8 py-20">
    <div class="mb-8">
        <h1 class="text-gray-900 text-4xl md:text-5xl font-bold mb-4">Evaluasi Peserta</h1>
        <p class="text-gray-600">
            Hasil evaluasi pre-test dan post-test peserta pelatihan Pendamping Proses Produk Halal (PPH)
        </p>
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full text-center text-gray-800">
            <thead class="bg-purple-700 text-white">
                <tr>
                    <th class="px-6 py-3">Nama Peserta</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Pre-Test</th>
                    <th class="px-6 py-3">Post-Test</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peserta as $p)
                    @php
                        $pre = $p->testResult?->pre_test_score;
                        $post = $p->testResult?->post_test_score;
                    @endphp
                    <tr class="border-b hover:bg-gray-100 transition-colors">
                        <td class="px-4 py-3 font-medium">{{ $p->name }}</td>
                        <td class="px-4 py-3">{{ $p->email }}</td>
                        <td class="px-4 py-3">{{ $pre ?? 'Belum Diisi' }}</td>
                        <td class="px-4 py-3">{{ $post ?? 'Belum Diisi' }}</td>
                        <td class="px-4 py-3">

                            @if ($pre !== null)
                                @if ($pre >= $kkm)
                                    <span class="text-green-500 font-bold">Lulus</span>
                                @else
                                    <span class="text-red-500 font-bold">Tidak Lulus</span>
                                @endif
                            @else
                                <span class="text-yellow-500 font-bold">Belum Dikerjakan</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-3 text-center text-gray-500">Tidak ada data hasil tes</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
