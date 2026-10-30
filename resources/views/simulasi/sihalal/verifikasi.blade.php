@extends('layouts.simulasi')

@section('title', 'Verifikasi Akun SiHalal')

@push('styles')
    @include('simulasi.partials.auth-style')
<style>
    .tabs { display: grid; grid-template-columns: 1fr 1fr; border-bottom: 2px solid var(--garis); margin: 20px 0 22px; }
    .tab { background: none; border: 0; border-bottom: 2px solid transparent; margin-bottom: -2px; padding: 12px 8px; font: inherit; font-weight: 600; color: var(--teks); cursor: pointer; }
    .tab[aria-selected="true"] { color: var(--u700); border-bottom-color: var(--u700); }
    h2.sub-judul { margin: 0 0 6px; font-size: 20px; color: #4b4457; }
    .input[readonly] { background: #f8f7fa; color: var(--abu); }
    .kembali { display: block; text-align: center; margin-top: 18px; color: var(--u700); font-size: 14px; text-decoration: none; }
    .kembali:hover { text-decoration: underline; }
    .salah { color: #b91c1c; font-size: 13px; margin: -6px 0 12px; display: none; }
    .sukses { display: none; }
    .panel-ungu { background: linear-gradient(160deg, #8b1fa9 0%, #5b1a7e 50%, #1e1b5e 100%); }
    .panel-ungu .logo-besar { font-size: 56px; font-weight: 800; opacity: .9; text-align: center; letter-spacing: 2px; }

    #popupKode { position: fixed; right: 24px; bottom: 24px; width: 380px; max-width: calc(100vw - 24px); z-index: 150;
        background: #fff; border: 2px solid var(--u700); border-radius: 16px; box-shadow: 0 16px 48px rgba(61,22,81,.35); display: none; overflow: hidden; }
    #popupKode.tampil { display: block; animation: naik .3s ease-out; }
    #popupKode .kepala { background: var(--u700); color: #fff; padding: 12px 16px; font-weight: 700; font-size: 14px; display: flex; gap: 8px; align-items: center; }
    #popupKode .isi { padding: 16px; font-size: 13px; line-height: 1.6; color: #3b3150; }
    #popupKode .tujuan { font-weight: 700; color: var(--u900); word-break: break-all; }
    #popupKode .kode-label { margin-top: 12px; font-size: 12px; color: var(--abu); }
    #popupKode .kode { font-size: 34px; font-weight: 800; letter-spacing: 8px; color: var(--u700); text-align: center; background: var(--u50); border: 1.5px dashed var(--u500); border-radius: 12px; padding: 12px 8px; margin-top: 4px; }
    #popupKode .peringatan { margin-top: 12px; font-size: 12px; color: #92400e; background: #fef3c7; border-radius: 8px; padding: 8px 10px; }
    @keyframes naik { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    @media (max-width: 860px) {
        #popupKode { right: 12px; left: 12px; bottom: 12px; width: auto; max-width: none; }
        body.ada-popup .auth-wrap { padding-bottom: 380px; }
    }
</style>
@endpush

@section('body')
<div class="auth-wrap">
    <div class="auth-kiri">
        <div class="auth-kartu lebar">
            <div class="logo-mark"><span class="kotak">SH</span> SiHalal</div>
            <h1 class="judul">Akun Kamu Berhasil Terdaftar!</h1>
            <p class="sub">Terima kasih telah membuat akun di website SiHalal, untuk proses selanjutnya verifikasi menggunakan nomor handphone atau email yang telah terdaftar</p>

            <div class="tabs" role="tablist">
                <button type="button" class="tab" role="tab" id="tabHp" aria-selected="true">Nomor Handphone</button>
                <button type="button" class="tab" role="tab" id="tabEmail" aria-selected="false">Email</button>
            </div>

            <h2 class="sub-judul" id="judulKanal">Verifikasi dengan Nomor Handphone</h2>
            <p class="sub" id="petunjuk">klik button untuk mengirim kode verifikasi</p>

            <div class="field">
                <input type="text" id="tujuan" class="input" readonly aria-label="Tujuan verifikasi">
            </div>

            <button type="button" class="btn btn-primer btn-blok" id="btnKirim">Kirim Kode Verifikasi</button>

            <div id="blokKode" style="display:none; margin-top:22px;">
                <div class="field">
                    <label for="inputKode">Masukkan kode verifikasi</label>
                    <input type="text" id="inputKode" class="input" inputmode="numeric" maxlength="6" placeholder="6 digit kode" autocomplete="off">
                </div>
                <div class="salah" id="pesanSalah">Kode yang dimasukkan belum sesuai. Periksa kembali kode pada kotak simulasi.</div>
                <button type="button" class="btn btn-primer btn-blok" id="btnVerifikasi">Verifikasi</button>
                <p class="bawah"><a href="#" id="kirimUlang">Kirim ulang kode</a></p>
            </div>

            <div class="notif ok sukses" id="pesanSukses" style="margin-top:16px">Verifikasi berhasil (simulasi). Mengarahkan ke halaman login&hellip;</div>

            <a class="kembali" href="{{ route('simulasi.sihalal.daftar') }}">&larr; Kembali ke Halaman Buat Akun</a>
        </div>
    </div>

    <aside class="panel-kanan panel-ungu">
        <div class="logo-besar">SiHalal</div>
        <p style="text-align:center;margin-top:16px;opacity:.9">Halaman ini adalah simulasi pelatihan LP3H.<br>Tidak ada pesan yang benar-benar dikirim.</p>
    </aside>
</div>

<div id="popupKode" role="status" aria-live="polite">
    <div class="kepala">@include('simulasi.partials.ikon', ['nama' => 'info']) Simulasi: kode verifikasi Anda</div>
    <div class="isi">
        Pada SiHalal yang asli, kode verifikasi akan dikirim ke <b id="kataKanal">nomor handphone</b> yang Anda daftarkan:
        <div class="tujuan" id="tujuanPopup"></div>
        <div style="margin-top:8px">Karena ini hanya latihan, tidak ada SMS atau email yang dikirim. Kode ditampilkan di sini agar Anda bisa melanjutkan simulasi.</div>
        <div class="kode-label">Berikut adalah nomor verifikasi Anda:</div>
        <div class="kode" id="kodeTampil">------</div>
        <div class="peringatan">Di sistem yang sesungguhnya, jangan pernah membagikan kode verifikasi kepada siapa pun.</div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        var kanal = 'hp';
        var kode = null;
        var data = {};
        try { data = JSON.parse(sessionStorage.getItem('sim_sihalal') || '{}') || {}; } catch (e) { data = {}; }

        var el = function (id) { return document.getElementById(id); };

        function nomorHp() {
            var h = (data.hp || '').replace(/[^0-9]/g, '');
            if (!h) return '';
            if (h.indexOf('62') === 0) return h;
            if (h.indexOf('0') === 0) h = h.slice(1);
            return '62' + h;
        }
        function tujuan() {
            return kanal === 'hp' ? nomorHp() : (data.email || '');
        }
        function tampilTujuan() {
            var t = el('tujuan');
            t.value = tujuan();
            t.placeholder = kanal === 'hp' ? '628xxxxxxxxxx' : 'contoh@email.com';
        }
        function reset() {
            kode = null;
            el('popupKode').classList.remove('tampil');
            document.body.classList.remove('ada-popup');
            el('blokKode').style.display = 'none';
            el('pesanSalah').style.display = 'none';
            el('inputKode').value = '';
            el('btnKirim').style.display = '';
        }
        function pilihKanal(k) {
            kanal = k;
            el('tabHp').setAttribute('aria-selected', k === 'hp');
            el('tabEmail').setAttribute('aria-selected', k === 'email');
            el('judulKanal').textContent = k === 'hp' ? 'Verifikasi dengan Nomor Handphone' : 'Verifikasi dengan Email';
            reset();
            tampilTujuan();
        }
        function buatKode() {
            var a = new Uint32Array(1);
            (window.crypto || window.msCrypto).getRandomValues(a);
            return String(100000 + (a[0] % 900000));
        }
        function kirim() {
            kode = buatKode();
            el('kataKanal').textContent = kanal === 'hp' ? 'nomor handphone' : 'email';
            el('tujuanPopup').textContent = tujuan() || (kanal === 'hp' ? '(nomor yang Anda isi)' : '(email yang Anda isi)');
            el('kodeTampil').textContent = kode;
            el('popupKode').classList.add('tampil');
            document.body.classList.add('ada-popup');
            el('blokKode').style.display = 'block';
            el('btnKirim').style.display = 'none';
            el('pesanSalah').style.display = 'none';
            el('inputKode').value = '';
            el('inputKode').focus();
        }

        el('tabHp').addEventListener('click', function () { pilihKanal('hp'); });
        el('tabEmail').addEventListener('click', function () { pilihKanal('email'); });
        el('btnKirim').addEventListener('click', kirim);
        el('kirimUlang').addEventListener('click', function (e) { e.preventDefault(); kirim(); tampilkanToast('Kode baru telah dibuat (simulasi).'); });

        el('btnVerifikasi').addEventListener('click', function () {
            if (el('inputKode').value.trim() === kode) {
                el('pesanSalah').style.display = 'none';
                el('pesanSukses').style.display = 'block';
                el('btnVerifikasi').disabled = true;
                try {
                    if (data.nama && data.nama.trim()) sessionStorage.setItem('sim_sihalal_nama', data.nama.trim());
                    sessionStorage.removeItem('sim_sihalal');
                } catch (e) {}
                setTimeout(function () { window.location.href = @json(route('simulasi.sihalal.login', ['terverifikasi' => 1])); }, 1200);
            } else {
                el('pesanSalah').style.display = 'block';
            }
        });
        el('inputKode').addEventListener('keydown', function (e) { if (e.key === 'Enter') el('btnVerifikasi').click(); });

        tampilTujuan();
    })();
</script>
@endpush
