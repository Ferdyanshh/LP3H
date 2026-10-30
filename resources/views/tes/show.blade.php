@extends('layouts.app')

@section('title', $label . ' - Pelatihan Pendamping Proses Produk Halal (PPH)')

@push('styles')
<style>
    .question-container {
        display: none;
    }
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-8 py-20">

    <div class="text-center mb-10">
        <h1 class="text-4xl font-semibold text-gray-900 mb-4">Selamat Datang di Pelatihan</h1>
        <p class="text-lg text-gray-700">
            Sekarang waktunya untuk mengerjakan {{ $label }} sebagai evaluasi {{ $jenis === 'pre' ? 'awal' : 'akhir' }} Anda.
        </p>
        <button type="button" id="startTestBtn"
                class="inline-block mt-4 px-8 py-3 bg-purple-700 text-white text-lg rounded-full hover:bg-purple-800 transition-all">
            Mulai {{ $label }}
        </button>
    </div>

    <div id="questions-container" class="question-container bg-white p-8 rounded-xl shadow-lg mt-10">
        <h2 class="text-3xl font-semibold text-center text-gray-900 mb-6">{{ $label }} Pelatihan</h2>

        <form id="testForm">
            @csrf

            @foreach ($soal as $no => $item)
                <div class="mt-4">
                    <label class="block text-sm text-gray-600 mb-2">{{ $no }}. {{ $item['pertanyaan'] }} ({{ $item['poin'] }} poin)</label>
                    @foreach ($item['opsi'] as $huruf => $teks)
                        <input type="radio" id="q{{ $no }}_{{ $huruf }}" name="q{{ $no }}" value="{{ $huruf }}">
                        <label for="q{{ $no }}_{{ $huruf }}">{{ $teks }}</label>@if (! $loop->last)<br>@endif
                    @endforeach
                </div>
            @endforeach

            <button type="button" id="submitBtn"
                    class="mt-6 px-6 py-3 bg-purple-700 text-white rounded-full hover:bg-purple-800 transition-all">
                Kirim Jawaban
            </button>
        </form>

        <div id="resultContainer" class="mt-10 text-center" style="display: none;">
            <h3 class="text-xl font-semibold text-gray-900">Skor Anda:</h3>
            <p id="score" class="text-2xl font-bold text-purple-700"></p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const totalSoal = {{ count($soal) }};
    const submitUrl = @json(route('submit_' . $jenis . '_test'));
    const startBtn = document.getElementById('startTestBtn');
    const questionsContainer = document.getElementById('questions-container');
    const submitBtn = document.getElementById('submitBtn');

    startBtn.addEventListener('click', function () {
        questionsContainer.classList.remove('question-container');
        questionsContainer.classList.add('fade-in');
        startBtn.style.display = 'none';
    });

    submitBtn.addEventListener('click', function () {
        const form = document.getElementById('testForm');

        const terjawab = form.querySelectorAll('input[type="radio"]:checked').length;
        if (terjawab < totalSoal) {
            alert('Mohon jawab semua ' + totalSoal + ' pertanyaan sebelum mengirim!');
            return;
        }

        submitBtn.disabled = true;

        fetch(submitUrl, {
            method: 'POST',
            headers: { 'Accept': 'application/json' },
            body: new FormData(form)
        })
        .then(function (response) {
            if (!response.ok) throw new Error('HTTP ' + response.status);
            return response.json();
        })
        .then(function (data) {
            document.getElementById('score').textContent = data.score + ' / ' + data.max + ' Poin';
            document.getElementById('resultContainer').style.display = 'block';
            form.style.display = 'none';
            window.scrollTo(0, 0);
        })
        .catch(function (error) {
            console.error('Error:', error);
            submitBtn.disabled = false;
            alert('Terjadi kesalahan saat mengirim jawaban.');
        });
    });
</script>
@endpush
