
@php
    $warna = ['success' => 'bg-green-500', 'danger' => 'bg-red-500', 'error' => 'bg-red-500', 'warning' => 'bg-yellow-500'];
@endphp

@if (session()->hasAny(array_keys($warna)) || $errors->any())
    <div class="container mx-auto px-8 mt-6 space-y-3">
        @foreach ($warna as $kunci => $kelas)
            @if (session($kunci))
                <div class="p-4 text-white rounded-lg {{ $kelas }}">{{ session($kunci) }}</div>
            @endif
        @endforeach

        @if ($errors->any())
            <div class="p-4 text-white rounded-lg bg-red-500">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $pesan)
                        <li>{{ $pesan }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endif
