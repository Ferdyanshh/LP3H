@extends('layouts.simulasi')

@section('title', 'Isi Nomor Induk Berusaha')

@push('styles')
    @include('simulasi.partials.onboarding-style')
<style>

    #popupNib { position: fixed; right: 24px; bottom: 24px; width: 390px; max-width: calc(100vw - 24px); z-index: 150;
        background: #fff; border: 2px solid var(--u700); border-radius: 16px; box-shadow: 0 16px 48px rgba(61,22,81,.35); overflow: hidden; animation: naikNib .3s ease-out; }
    #popupNib .kepala { background: var(--u700); color: #fff; padding: 12px 16px; font-weight: 700; font-size: 14px; display: flex; gap: 8px; align-items: center; }
    #popupNib .isi { padding: 16px; font-size: 13px; line-height: 1.6; color: #3b3150; }
    #popupNib label { display: block; font-weight: 700; font-size: 12px; color: var(--u900); margin: 12px 0 6px; }
    #popupNib select { width: 100%; padding: 10px 12px; border: 1.5px solid var(--garis); border-radius: 10px; font: inherit; font-size: 13px; background: #fff; color: var(--teks); }
    #popupNib select:focus { outline: none; border-color: var(--u600); box-shadow: 0 0 0 3px rgba(122,47,148,.15); }
    #popupNib .nib-tampil { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 26px; font-weight: 800; letter-spacing: 3px; color: var(--u700);
        text-align: center; background: var(--u50); border: 1.5px dashed var(--u500); border-radius: 12px; padding: 12px 6px; margin-top: 4px; word-break: break-all; }
    #popupNib .nama-usaha { margin-top: 8px; font-weight: 700; color: var(--u900); }
    #popupNib .hasil { margin-top: 10px; font-size: 12px; background: #fef3c7; color: #78350f; border-radius: 8px; padding: 8px 10px; }
    #popupNib .btn { margin-top: 12px; }
    @keyframes naikNib { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    @media (max-width: 860px) {
        #popupNib { right: 12px; left: 12px; bottom: 12px; width: auto; max-width: none; }
        .ob-wrap { padding-bottom: 440px; }
    }
</style>
@endpush

@section('body')
<div class="ob-wrap">
    <div class="ob-logo"><span class="kotak">SH</span> SiHalal</div>

    <div class="ob-kartu">
        <div class="ob-kepala">
            <div>
                <h1 class="ob-judul">Isi Nomor Induk Berusaha</h1>
                <p class="ob-sub">Masukkan Nomor Induk Berusaha untuk menarik data usaha secara otomatis.</p>
            </div>
            <span class="langkah-badge">Langkah 1/3</span>
        </div>

        <div class="field" style="margin-top:28px">
            <label for="nib">NIB</label>
            <input type="text" id="nib" class="input" inputmode="numeric" maxlength="13" placeholder="Nomor Induk Berusaha" autocomplete="off">
            <div class="galat" id="galat"></div>
        </div>

        <div class="info-box">
            @include('simulasi.partials.ikon', ['nama' => 'info'])
            <div>Pastikan NIB yang dimasukkan sudah sesuai agar data terisi otomatis dan meminimalkan input ulang.</div>
        </div>

        <div class="dua-btn">
            <button type="button" class="btn btn-primer" id="btnKirim">Kirim</button>
            <a href="{{ route('simulasi.sihalal.onboarding.asal') }}" class="btn btn-garis">Kembali</a>
        </div>
    </div>
</div>

<div id="popupNib" role="region" aria-label="NIB untuk latihan">
    <div class="kepala">@include('simulasi.partials.ikon', ['nama' => 'info']) Simulasi: NIB untuk latihan</div>
    <div class="isi">
        Pada SiHalal yang asli, NIB berasal dari usaha Anda yang terdaftar di OSS. Karena ini hanya latihan, gunakan NIB contoh (fiktif) di bawah ini. Pilih skenario, lalu ketik atau isi NIB-nya ke kolom di sebelah kiri.

        <label for="pilihSkenario">Pilih skenario latihan</label>
        <select id="pilihSkenario">
            @foreach (config('sihalal.nib_contoh') as $c)
                <option value="{{ $c['nib'] }}">{{ $c['skenario'] }}</option>
            @endforeach
        </select>

        <label style="margin-top:14px">Berikut adalah NIB untuk skenario ini:</label>
        <div class="nib-tampil" id="nibTampil">-</div>
        <div class="nama-usaha" id="namaTampil"></div>

        <button type="button" class="btn btn-garis btn-kecil btn-blok" id="btnIsi">Isi kolom NIB dengan nomor ini</button>
        <div class="hasil">Data ini fiktif. Jangan memakai NIB usaha yang sebenarnya.</div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        var daftar = @json(config('sihalal.nib_contoh'));
        var input = document.getElementById('nib');
        var galat = document.getElementById('galat');
        var pilih = document.getElementById('pilihSkenario');

        function tampilGalat(pesan) { galat.textContent = pesan; galat.style.display = 'block'; }
        function cari(nib) { return daftar.filter(function (d) { return d.nib === nib; })[0]; }

        function perbaruiPopup() {
            var d = cari(pilih.value);
            document.getElementById('nibTampil').textContent = d ? d.nib : '-';
            document.getElementById('namaTampil').textContent = d ? d.nama_perusahaan : '';
        }
        pilih.addEventListener('change', perbaruiPopup);
        perbaruiPopup();

        document.getElementById('btnIsi').addEventListener('click', function () {
            input.value = pilih.value;
            galat.style.display = 'none';
            input.focus();
        });

        input.addEventListener('input', function () {
            input.value = input.value.replace(/\D/g, '');
            galat.style.display = 'none';
        });

        function kirim() {
            var v = input.value.replace(/\D/g, '');
            if (v.length !== 13) { tampilGalat('NIB harus terdiri dari 13 digit angka.'); return; }
            var hit = cari(v);
            if (!hit) { tampilGalat('NIB tidak ditemukan pada data simulasi. Gunakan NIB pada kotak simulasi.'); return; }
            try { sessionStorage.setItem('sim_sihalal_nib', JSON.stringify(hit)); } catch (e) {}
            window.location.href = @json(route('simulasi.sihalal.onboarding.data'));
        }

        document.getElementById('btnKirim').addEventListener('click', kirim);
        input.addEventListener('keydown', function (e) { if (e.key === 'Enter') kirim(); });
    })();
</script>
@endpush
