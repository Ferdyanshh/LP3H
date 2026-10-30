@extends('layouts.simulasi')

@section('title', 'Buat Akun SiHalal')

@push('styles')
    @include('simulasi.partials.auth-style')
@endpush

@section('body')
<div class="auth-wrap">
    <div class="auth-kiri">
        <div class="auth-kartu lebar">
            <div class="logo-mark"><span class="kotak">SH</span> SiHalal</div>
            <h1 class="judul">Buat Akun <em>SiHalal</em></h1>
            <p class="sub">Silahkan buat akun menggunakan fitur web SiHalal</p>

            <form method="GET" action="{{ route('simulasi.sihalal.verifikasi') }}" id="formDaftar" autocomplete="off">

                <div class="field">
                    <label for="tipe">Tipe Pengguna</label>
                    <select id="tipe" class="input">
                        <option value="" selected disabled>Tipe Pengguna</option>
                        @foreach (config('sihalal.tipe_pengguna') as $tipe)
                            <option>{{ $tipe }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" class="input" placeholder="Masukan Nama">
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="input" placeholder="Masukan Email">
                </div>
                <div class="field">
                    <label for="hp">Nomor Handphone</label>
                    <div class="row2">
                        <select class="input" aria-label="Kode negara"><option>+62</option></select>
                        <input type="tel" id="hp" class="input" placeholder="Masukan Nomor Handphone">
                    </div>
                </div>
                <div class="field input-ikon">
                    <label for="sandi1">Kata Sandi</label>
                    <input type="password" id="sandi1" class="input" placeholder="Masukan kata sandi">
                    <button type="button" data-toggle-sandi="sandi1" style="top: 70%" aria-label="Tampilkan kata sandi">@include('simulasi.partials.ikon', ['nama' => 'eye'])</button>
                </div>
                <div class="field input-ikon">
                    <label for="sandi2">Konfirmasi Kata Sandi</label>
                    <input type="password" id="sandi2" class="input" placeholder="Masukan konfirmasi kata sandi">
                    <button type="button" data-toggle-sandi="sandi2" style="top: 70%" aria-label="Tampilkan kata sandi">@include('simulasi.partials.ikon', ['nama' => 'eye'])</button>
                </div>

                <button type="submit" class="btn btn-primer btn-blok">Buat Akun</button>
            </form>

            <p class="bawah">Sudah punya akun? <a href="{{ route('simulasi.sihalal.login') }}">Masuk di sini</a></p>
            <div class="terhubung"><span>Terhubung ke <span class="pil">OSS</span></span></div>
        </div>
    </div>

    <aside class="panel-kanan polos">
        <div>
            <strong style="font-size:18px;color:var(--u800)">Area Simulasi</strong>
            <p style="max-width:320px">Pendaftaran ini hanya latihan. Tidak ada akun sungguhan yang dibuat dan tidak ada data yang disimpan.</p>
        </div>
    </aside>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('formDaftar').addEventListener('submit', function () {
        try {
            sessionStorage.setItem('sim_sihalal', JSON.stringify({
                nama: document.getElementById('nama').value,
                email: document.getElementById('email').value,
                hp: document.getElementById('hp').value
            }));
        } catch (e) {  }
    });
</script>
@endpush
