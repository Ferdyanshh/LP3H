@extends('layouts.simulasi')

@section('title', 'Login SiHalal')

@push('styles')
    @include('simulasi.partials.auth-style')
@endpush

@section('body')
<div class="auth-wrap">
    <div class="auth-kiri">
        <div class="auth-kartu">
            <div class="logo-mark"><span class="kotak">SH</span> SiHalal</div>
            <h1 class="judul">Selamat Datang di <em>SiHalal</em></h1>
            <p class="sub">Login untuk mengakses fitur pada web SiHalal</p>

            @if (request('terverifikasi'))
                <div class="notif ok">Akun contoh berhasil diverifikasi (simulasi). Silakan masuk dengan isian apa saja.</div>
            @endif

            <form method="GET" action="{{ route('simulasi.sihalal.onboarding.asal') }}" autocomplete="off">
                <div class="field">
                    <input type="text" class="input" placeholder="Username" aria-label="Username">
                </div>
                <div class="field input-ikon">
                    <input type="password" id="sandi" class="input" placeholder="Kata Sandi" aria-label="Kata Sandi">
                    <button type="button" data-toggle-sandi="sandi" aria-label="Tampilkan kata sandi">@include('simulasi.partials.ikon', ['nama' => 'eye'])</button>
                </div>
                <div class="kanan"><a href="#" class="tautan" data-segera>Lupa Kata Sandi</a></div>

                <label class="captcha">
                    <input type="checkbox" id="captcha">
                    <span>Saya bukan robot</span>
                    <small>captcha simulasi</small>
                </label>

                <button type="submit" id="btnMasuk" class="btn btn-primer btn-blok" disabled>
                    @include('simulasi.partials.ikon', ['nama' => 'login']) Masuk
                </button>
            </form>

            <p class="bawah">Belum punya akun? <a href="{{ route('simulasi.sihalal.daftar') }}">Daftar di sini</a></p>

            <div class="info-peramban">
                @include('simulasi.partials.ikon', ['nama' => 'info'])
                <div><b>Info Kompatibilitas Peramban</b>Disarankan menggunakan Google Chrome versi terbaru untuk hasil terbaik.</div>
            </div>

            <div class="terhubung">
                <span>Terhubung ke <span class="pil">OSS</span></span>
                <span>Update: {{ now()->locale('id')->translatedFormat('d F Y') }}</span>
            </div>
        </div>
    </div>

    <aside class="panel-kanan">
        <h2>SIMULASI PELATIHAN</h2>
        <div class="kotak-pesan">
            <h3>Ini bukan situs resmi SiHalal</h3>
            Halaman ini dibuat LP3H Telkom University untuk latihan alur penggunaan SiHalal.
            <ul>
                <li>Isikan data apa saja &mdash; tidak ada yang disimpan atau dikirim.</li>
                <li>Jangan memasukkan username, kata sandi, atau data pribadi asli.</li>
                <li>Untuk mengurus sertifikasi halal yang sesungguhnya, gunakan portal resmi lewat tombol &ldquo;Kunjungi Portal SiHalal&rdquo; di halaman pelatihan.</li>
            </ul>
        </div>
    </aside>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('captcha').addEventListener('change', function () {
        document.getElementById('btnMasuk').disabled = !this.checked;
    });
</script>
@endpush
