@extends('layouts.simulasi')

@section('title', 'Data Nomor Induk Berusaha')

@push('styles')
    @include('simulasi.partials.onboarding-style')
@endpush

@section('body')
<div class="ob-wrap">
    <div class="ob-logo"><span class="kotak">SH</span> SiHalal</div>

    <div class="ob-kartu lebar">
        <div class="ob-kepala">
            <div>
                <h1 class="ob-judul">Data Nomor Induk Berusaha</h1>
                <p class="ob-sub">Periksa kembali data NIB sebelum dikirim.</p>
            </div>
            <span class="langkah-badge">Langkah 2/3</span>
        </div>

        <div class="data-grid">
            <div>
                <div style="margin-bottom:20px"><small>Nomor Induk Berusaha</small><b id="vNib"></b></div>
                <div style="margin-bottom:20px"><small>Nama Perusahaan</small><b id="vNama"></b></div>
                <div style="margin-bottom:20px"><small>Alamat</small><b id="vAlamat"></b></div>
                <div><small>NPWP</small><b id="vNpwp"></b></div>
            </div>
            <div>
                <div style="margin-bottom:20px"><small>Status NIB</small><span id="vStatus"></span></div>
                <div style="margin-bottom:20px"><small>Kategori Pelaku Usaha</small><b id="vKategori"></b></div>
                <div><small>Modal Dasar</small><b id="vModal"></b></div>
            </div>
        </div>

        <div class="info-box kuning" id="infoNonUmk" style="display:none; margin-bottom:18px">
            @include('simulasi.partials.ikon', ['nama' => 'info'])
            <div><b>Kategori Non UMK.</b> Jalur Self Declare hanya untuk usaha mikro dan kecil (UMK). Pelaku usaha Non UMK mengajukan sertifikasi lewat jalur Reguler. Anda tetap bisa melanjutkan simulasi ini.</div>
        </div>

        <div class="tbl-kepala">
            <span>Daftar Usaha / Kegiatan</span>
            <span class="langkah-badge" id="jumlahKbli" style="background:var(--u700);color:#fff"></span>
        </div>
        <div class="tbl-wrap">
            <table class="tbl">
                <thead><tr><th>No</th><th>KBLI</th><th>Nama Usaha</th><th>Alamat</th><th>Modal Usaha</th></tr></thead>
                <tbody id="tbKegiatan"></tbody>
            </table>
        </div>
        <div class="tbl-kaki" id="kakiTabel"></div>

        <div class="dua-btn" style="margin-top:22px">
            <button type="button" class="btn btn-primer" id="btnKirim">Kirim</button>
            <a href="{{ route('simulasi.sihalal.onboarding.nib') }}" class="btn btn-garis">Kembali</a>
        </div>
        <div class="galat" id="galat" style="text-align:center"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        var rp = function (n) { return 'Rp ' + Number(n || 0).toLocaleString('id-ID'); };
        var el = function (id) { return document.getElementById(id); };
        var d = null;
        try { d = JSON.parse(sessionStorage.getItem('sim_sihalal_nib') || 'null'); } catch (e) {}

        if (!d) { window.location.replace(@json(route('simulasi.sihalal.onboarding.nib'))); return; }

        el('vNib').textContent = d.nib;
        el('vNama').textContent = d.nama_perusahaan;
        el('vAlamat').textContent = d.alamat;
        el('vNpwp').textContent = d.npwp;
        el('vKategori').textContent = d.kategori;
        el('vModal').textContent = rp(d.modal_dasar);

        var terdaftar = d.status === 'terdaftar';
        var st = el('vStatus');
        st.className = terdaftar ? 'merah' : 'hijau-teks';
        st.textContent = terdaftar ? 'NIB sudah di daftarkan oleh user : ' + d.didaftarkan_oleh : 'NIB belum didaftarkan';

        if (d.kategori !== 'UMK') el('infoNonUmk').style.display = 'flex';

        var tb = el('tbKegiatan');
        (d.kegiatan || []).forEach(function (k, i) {
            var tr = document.createElement('tr');
            [String(i + 1), k.kbli, k.nama, k.alamat, rp(k.modal)].forEach(function (t) {
                var td = document.createElement('td'); td.textContent = t; tr.appendChild(td);
            });
            tb.appendChild(tr);
        });
        var n = (d.kegiatan || []).length;
        el('jumlahKbli').textContent = n + ' KBLI';
        el('kakiTabel').textContent = 'Items per page: 5   1-' + n + ' of ' + n;

        var btn = el('btnKirim');
        if (terdaftar) {
            btn.disabled = true;
            var g = el('galat');
            g.textContent = 'NIB ini sudah didaftarkan oleh pengguna lain, sehingga tidak dapat dilanjutkan. Klik Kembali dan gunakan NIB lain.';
            g.style.display = 'block';
        }

        btn.addEventListener('click', function () {
            try {
                sessionStorage.setItem('sim_sihalal_profil', JSON.stringify({
                    nib: d.nib, nama_perusahaan: d.nama_perusahaan, kategori: d.kategori, skala: d.skala, modal_dasar: d.modal_dasar
                }));
            } catch (e) {}
            window.location.href = @json(route('simulasi.sihalal.dashboard'));
        });
    })();
</script>
@endpush
