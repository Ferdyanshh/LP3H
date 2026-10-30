@extends('layouts.simulasi')

@section('title', 'Dashboard SiHalal')

@push('styles')
<style>
    .layout { display: flex; min-height: calc(100vh - 38px); }
    .sidebar { width: 280px; flex: none; background: var(--u800); color: #e9dcf0; padding: 22px 14px; position: sticky; top: 38px; align-self: flex-start;
        height: calc(100vh - 38px); overflow-y: auto; background-image: linear-gradient(180deg, var(--u800), var(--u900)); }
    .sb-logo { display: flex; align-items: center; gap: 10px; color: #fff; font-weight: 800; font-size: 22px; padding: 0 10px 18px; }
    .sb-logo .kotak { width: 36px; height: 36px; border-radius: 10px; background: rgba(255,255,255,.14); display: grid; place-items: center; font-size: 14px; }
    .sb-judul { font-size: 11px; letter-spacing: 1.5px; text-transform: uppercase; color: #a98bb8; padding: 18px 12px 8px; font-weight: 700; }
    .sb-item { display: flex; align-items: center; gap: 12px; padding: 11px 12px; border-radius: 10px; color: #f5ecfa; text-decoration: none; font-size: 14px; font-weight: 600; line-height: 1.35; }
    .sb-item:hover { background: rgba(255,255,255,.07); }
    .sb-item.aktif { background: var(--u700); color: #fff; }
    .sb-item .ik { width: 20px; height: 20px; }

    .konten { flex: 1; min-width: 0; padding: 20px 28px 40px; }
    .topbar { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(61,22,81,.06); padding: 12px 20px; display: flex; align-items: center; justify-content: flex-end; gap: 16px; max-width: 1180px; margin: 0 auto 22px; }
    .hamburger { display: none; margin-right: auto; background: none; border: 1.5px solid var(--garis); border-radius: 8px; padding: 6px 10px; cursor: pointer; font-size: 18px; }
    .top-link { font-size: 12px; font-weight: 700; letter-spacing: 1px; color: var(--u700); text-decoration: none; display: inline-flex; gap: 6px; align-items: center; }
    .bahasa { border: 1.5px solid #222; border-radius: 8px; padding: 6px 12px; font-size: 13px; font-weight: 600; background: #fff; }
    .avatar { width: 42px; height: 42px; border-radius: 50%; background: #e4e1ea; display: grid; place-items: center; color: #8d8699; position: relative; }
    .avatar::after { content: ''; position: absolute; right: 1px; bottom: 1px; width: 10px; height: 10px; border-radius: 50%; background: #22c55e; border: 2px solid #fff; }
    .avatar .ik { width: 24px; height: 24px; }

    .halaman { max-width: 1180px; margin: 0 auto; }
    .hero { display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(0, 1fr); gap: 32px; align-items: center; padding: 28px 8px 36px; border-bottom: 1px solid var(--garis); margin-bottom: 28px; }
    .badge { display: inline-flex; gap: 8px; align-items: center; background: var(--u100); color: var(--u700); font-size: 12px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; padding: 8px 14px; border-radius: 999px; }
    .hero h1 { font-size: 44px; line-height: 1.15; margin: 22px 0 14px; color: var(--teks); font-weight: 800; }
    .hero h1 em { font-style: normal; color: var(--u700); }
    .hero p { color: var(--abu); font-size: 16px; line-height: 1.6; max-width: 520px; margin: 0 0 16px; }
    .chips { display: flex; gap: 8px; margin-bottom: 22px; flex-wrap: wrap; }
    .chip { display: inline-flex; gap: 6px; align-items: center; font-size: 13px; font-weight: 600; padding: 6px 12px; border-radius: 999px; background: var(--u100); color: var(--u700); }
    .chip.hijau { background: var(--ok-bg); color: var(--ok); }
    .chip.kuning { background: #fef3c7; color: #92400e; }
    .notif-umk { background: #fef3c7; color: #78350f; border-radius: 10px; padding: 12px 14px; font-size: 13px; line-height: 1.5; margin-bottom: 18px; max-width: 520px; }
    .aksi { display: flex; gap: 12px; flex-wrap: wrap; }

    .kartu { background: #fff; border-radius: 16px; box-shadow: 0 4px 20px rgba(61,22,81,.08); overflow: hidden; }
    .kartu-kepala { background: linear-gradient(120deg, var(--u700), #702a86); color: #fff; padding: 16px 20px; display: flex; align-items: center; gap: 12px; font-weight: 700; }
    .kartu-kepala .ikon-kotak { width: 38px; height: 38px; border-radius: 10px; background: rgba(255,255,255,.18); display: grid; place-items: center; }
    .kartu-isi { padding: 20px 24px; }
    .langkah { display: flex; gap: 14px; position: relative; padding-bottom: 18px; }
    .langkah:last-child { padding-bottom: 0; }
    .langkah:not(:last-child)::before { content: ''; position: absolute; left: 14px; top: 32px; bottom: 2px; width: 2px; background: var(--garis); }
    .no { width: 30px; height: 30px; border-radius: 50%; background: var(--u100); color: var(--u700); display: grid; place-items: center; font-size: 13px; font-weight: 800; flex: none; }
    .langkah b { display: block; font-size: 14px; }
    .langkah span { font-size: 13px; color: var(--abu); }

    .blok { margin-bottom: 28px; }
    .baris { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 16px 0; border-bottom: 1px solid var(--garis); flex-wrap: wrap; }
    .baris:last-child { border-bottom: 0; }
    .baris small { display: block; color: var(--abu); font-size: 13px; margin-top: 2px; }
    .baris .tombol { display: flex; gap: 8px; }
    .ikon-bulat { width: 40px; height: 40px; border-radius: 10px; background: var(--ok-bg); color: var(--ok); display: grid; place-items: center; margin-right: 14px; flex: none; }
    .kiri { display: flex; align-items: center; }
    .status-kecil { font-size: 11px; font-weight: 700; padding: 3px 9px; border-radius: 6px; background: var(--ok-bg); color: var(--ok); margin-right: 10px; }
    .judul-seksi { font-size: 18px; font-weight: 800; border-left: 3px solid var(--u700); padding-left: 10px; margin: 8px 0 14px; }
    .qr { width: 140px; height: 140px; border: 2px dashed var(--u200); border-radius: 12px; display: grid; place-items: center; text-align: center; font-size: 11px; color: var(--abu); padding: 10px; flex: none; }
    .survei { display: flex; gap: 28px; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; }
    .survei ol { margin: 0 0 16px; padding-left: 20px; color: #4b4457; font-size: 14px; line-height: 1.7; flex: 1; min-width: 260px; }
    .dua-kolom { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
    .tengah { text-align: center; }
    .tengah p { color: var(--abu); font-size: 14px; }
    .tengah .qr { margin: 14px auto; }
    .footer { text-align: center; color: var(--abu); font-size: 12px; padding: 24px 0 0; }

    @media (max-width: 1000px) {
        .hero { grid-template-columns: 1fr; }
        .hero h1 { font-size: 34px; }
        .dua-kolom { grid-template-columns: 1fr; }
    }
    @media (max-width: 900px) {
        .hamburger { display: block; }
        .sidebar { position: fixed; left: 0; top: 38px; z-index: 90; transform: translateX(-100%); transition: transform .25s; }
        .sidebar.buka { transform: translateX(0); }
        .konten { padding: 16px; }
    }
</style>
@endpush

@section('body')
@php
    $pengguna = config('sihalal.pengguna');
    $kata = explode(' ', trim(auth()->user()->name), 2);
@endphp

<div class="layout">
    <aside class="sidebar" id="sidebar">
        <div class="sb-logo"><span class="kotak">SH</span> SiHalal</div>

        @foreach (config('sihalal.menu') as $grup)
            <div class="sb-judul">{{ $grup['judul'] }}</div>
            @foreach ($grup['item'] as $item)
                @if ($item['route'])
                    <a href="{{ route($item['route']) }}" class="sb-item {{ request()->routeIs($item['route']) ? 'aktif' : '' }}">
                        @include('simulasi.partials.ikon', ['nama' => $item['ikon']]) {{ $item['label'] }}
                    </a>
                @else
                    <a href="#" class="sb-item" data-segera>
                        @include('simulasi.partials.ikon', ['nama' => $item['ikon']]) {{ $item['label'] }}
                    </a>
                @endif
            @endforeach
        @endforeach
    </aside>

    <main class="konten">
        <div class="topbar">
            <button type="button" class="hamburger" id="btnMenu" aria-label="Buka menu">&#9776;</button>
            <a href="#" class="top-link" data-segera>@include('simulasi.partials.ikon', ['nama' => 'doc']) DOKUMENTASI</a>
            <span class="bahasa">ID &#9662;</span>
            <a href="{{ route('simulasi.sihalal.login') }}" class="avatar" title="Keluar (kembali ke halaman login simulasi)">@include('simulasi.partials.ikon', ['nama' => 'user'])</a>
        </div>

        <div class="halaman">
            <section class="hero">
                <div>
                    <span class="badge">@include('simulasi.partials.ikon', ['nama' => 'grid']) Dashboard SiHalal</span>
                    <h1 id="sapaan">Selamat datang, {{ $kata[0] }}@if (isset($kata[1])) <em>{{ $kata[1] }}</em>@endif</h1>

                    <script>
                        (function () {
                            try {
                                var nama = (sessionStorage.getItem('sim_sihalal_nama') || '').trim().slice(0, 60);
                                if (!nama) return;
                                var bagian = nama.split(/\s+/);
                                var h = document.getElementById('sapaan');
                                h.textContent = 'Selamat datang, ' + bagian[0];
                                if (bagian.length > 1) {
                                    h.appendChild(document.createTextNode(' '));
                                    var em = document.createElement('em');
                                    em.textContent = bagian.slice(1).join(' ');
                                    h.appendChild(em);
                                }
                            } catch (e) {  }
                        })();
                    </script>
                    <p>Kelola proses sertifikasi halal Anda dengan lebih rapi, cepat, dan terpantau di satu tempat.</p>
                    <div class="chips" id="chips">
                        <span class="chip">@include('simulasi.partials.ikon', ['nama' => 'user']) {{ $pengguna['tipe'] }}</span>
                        <span class="chip hijau">@include('simulasi.partials.ikon', ['nama' => 'shield']) {{ $pengguna['status'] }}</span>
                    </div>
                    <div class="notif-umk" id="noticeNonUmk" style="display:none"></div>
                    <div class="aksi">
                        <a href="#" class="btn btn-primer" data-segera>@include('simulasi.partials.ikon', ['nama' => 'book']) Buka Dokumentasi</a>
                        <a href="#" class="btn btn-garis" data-segera>@include('simulasi.partials.ikon', ['nama' => 'list']) Lihat Status Pengajuan</a>
                    </div>
                </div>

                <div class="kartu">
                    <div class="kartu-kepala"><span class="ikon-kotak">@include('simulasi.partials.ikon', ['nama' => 'route'])</span> Langkah Cepat</div>
                    <div class="kartu-isi">
                        @foreach (config('sihalal.langkah_cepat') as $i => $l)
                            <div class="langkah">
                                <span class="no">{{ $i + 1 }}</span>
                                <div><b>{{ $l['judul'] }}</b><span>{{ $l['isi'] }}</span></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="blok kartu">
                <div class="kartu-kepala"><span class="ikon-kotak">@include('simulasi.partials.ikon', ['nama' => 'doc'])</span> Dokumen Publik</div>
                <div class="kartu-isi">
                    @foreach (config('sihalal.dokumen_publik') as $d)
                        <div class="baris">
                            <div><b>{{ $d['judul'] }}</b><small>{{ $d['isi'] }}</small></div>
                            <div class="tombol">
                                <a href="#" class="btn btn-primer btn-kecil" data-segera>@include('simulasi.partials.ikon', ['nama' => 'eye']) Buka PDF</a>
                                <a href="#" class="btn btn-garis btn-kecil" data-segera>@include('simulasi.partials.ikon', ['nama' => 'download']) Unduh PDF</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="blok kartu">
                <div class="kartu-kepala"><span class="ikon-kotak">@include('simulasi.partials.ikon', ['nama' => 'shield'])</span> Notifikasi Keamanan</div>
                <div class="kartu-isi">
                    @foreach (config('sihalal.keamanan') as $k)
                        <div class="baris">
                            <div class="kiri">
                                <span class="ikon-bulat">@include('simulasi.partials.ikon', ['nama' => $k['ikon']])</span>
                                <div><b>{{ $k['judul'] }}</b><small>{{ $k['isi'] }}</small></div>
                            </div>
                            <div class="kiri">
                                <span class="status-kecil">{{ $k['badge'] }}</span>
                                <a href="#" class="btn btn-garis btn-kecil" data-segera>{{ $k['aksi'] }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <h2 class="judul-seksi">Survei</h2>
            <section class="blok kartu">
                <div class="kartu-kepala"><span class="ikon-kotak">@include('simulasi.partials.ikon', ['nama' => 'info'])</span> {{ config('sihalal.survei.judul') }}</div>
                <div class="kartu-isi">
                    <div class="survei">
                        <div style="flex:1;min-width:260px">
                            <b>Survei Kepuasan Masyarakat Layanan:</b>
                            <ol style="margin-top:10px">
                                @foreach (config('sihalal.survei.daftar') as $s)
                                    <li>{{ $s }}</li>
                                @endforeach
                            </ol>
                            <a href="#" class="btn btn-primer btn-kecil" data-segera>@include('simulasi.partials.ikon', ['nama' => 'external']) Isi Survei Layanan</a>
                        </div>
                        <div class="qr">Area QR code<br>(contoh)</div>
                    </div>
                </div>
            </section>

            <div class="dua-kolom">
                @foreach (config('sihalal.survei.kartu') as $kartu)
                    <section class="kartu">
                        <div class="kartu-kepala"><span class="ikon-kotak">@include('simulasi.partials.ikon', ['nama' => 'doc'])</span> {{ $kartu['judul'] }}</div>
                        <div class="kartu-isi tengah">
                            <p>{{ $kartu['isi'] }}</p>
                            <div class="qr">Area QR code<br>(contoh)</div>
                            <a href="#" class="btn btn-garis btn-kecil" data-segera>@include('simulasi.partials.ikon', ['nama' => 'external']) {{ $kartu['tombol'] }}</a>
                        </div>
                    </section>
                @endforeach
            </div>

            <div class="footer">&copy; Simulasi LP3H Telkom University {{ date('Y') }}</div>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('btnMenu').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('buka');
    });
</script>
@endpush

@push('scripts')
<script>
    (function () {
        var p = null;
        try { p = JSON.parse(sessionStorage.getItem('sim_sihalal_profil') || 'null'); } catch (e) {}
        if (!p) return;

        var chips = document.getElementById('chips');
        function chip(teks, kelas) {
            var s = document.createElement('span');
            s.className = 'chip ' + (kelas || '');
            s.textContent = teks;
            chips.appendChild(s);
        }
        chip(p.nama_perusahaan);
        chip(p.kategori, p.kategori === 'UMK' ? 'hijau' : 'kuning');

        if (p.kategori !== 'UMK') {
            var n = document.getElementById('noticeNonUmk');
            n.textContent = 'Usaha Anda terkategori Non UMK, sehingga jalur Self Declare tidak tersedia. Gunakan menu Pengajuan Reguler.';
            n.style.display = 'block';
        }
    })();
</script>
@endpush
