@extends('layouts.simulasi')

@section('title', 'Profil Pelaku Usaha')

@push('styles')
    @include('simulasi.partials.workspace-style')
<style>
    .profile-summary { margin-bottom: 20px; padding: 20px; display: grid; grid-template-columns: 1fr auto; gap: 20px; align-items: center; }
    .profile-summary h2 { margin: 0 0 5px; font-size: 18px; }
    .profile-summary p { margin: 0; color: var(--abu); font-size: 13px; }
    .profile-progress { width: min(320px, 100%); }
    .profile-progress-head { margin-bottom: 7px; display: flex; justify-content: space-between; color: #554a5e; font-size: 12px; font-weight: 700; }
    .profile-progress-track { height: 9px; overflow: hidden; border-radius: 999px; background: #ebe7ee; }
    .profile-progress-bar { width: 0; height: 100%; border-radius: inherit; background: linear-gradient(90deg, var(--u700), #a855c3); transition: width .2s ease; }
    .profile-form { display: grid; gap: 18px; }
    .profile-card-head { justify-content: flex-start; }
    .profile-section-icon { width: 36px; height: 36px; display: grid; place-items: center; border-radius: 10px; background: var(--u100); color: var(--u700); }
    .profile-section-icon .ik { width: 19px; height: 19px; }
    .profile-card-head div:last-child p { margin: 3px 0 0; color: var(--abu); font-size: 12px; }
    .profile-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
    .profile-field.full { grid-column: 1 / -1; }
    .profile-field label { display: block; margin-bottom: 7px; color: #44384d; font-size: 12px; font-weight: 700; }
    .profile-field .input { min-height: 44px; }
    .profile-field textarea.input { min-height: 88px; resize: vertical; }
    .profile-field small { display: block; margin-top: 5px; color: var(--abu); font-size: 11px; }
    .profile-field .input[readonly] { background: #f5f3f7; color: #6b6472; cursor: not-allowed; }
    .profile-actions { position: sticky; bottom: 12px; z-index: 10; padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; gap: 14px; border: 1px solid var(--garis); border-radius: 13px; background: rgba(255,255,255,.96); box-shadow: 0 8px 26px rgba(61,22,81,.13); backdrop-filter: blur(8px); }
    .profile-actions p { margin: 0; color: var(--abu); font-size: 12px; }
    @media (max-width: 760px) {
        .profile-summary, .profile-grid { grid-template-columns: 1fr; }
        .profile-field.full { grid-column: auto; }
        .profile-actions { align-items: stretch; flex-direction: column; }
    }
</style>
@endpush

@section('body')
<div class="workspace-layout">
    @include('simulasi.partials.workspace-sidebar')

    <main class="workspace-main">
        @include('simulasi.partials.workspace-topbar')

        <div class="workspace-page">
            <div class="workspace-heading">
                <div>
                    <span class="workspace-eyebrow">Data Akun</span>
                    <h1>Pelaku Usaha</h1>
                    <p>Lengkapi identitas usaha yang akan digunakan pada pengajuan Self Declare.</p>
                </div>
                <a href="{{ route('simulasi.sihalal.self-declare') }}" class="btn btn-garis">@include('simulasi.partials.ikon', ['nama' => 'id']) Pengajuan Self Declare</a>
            </div>

            <div class="workspace-alert">
                Gunakan data latihan. Profil hanya disimpan sementara di browser dan tidak dikirim ke server atau BPJPH.
            </div>
            <div class="workspace-alert danger" id="profileRoleNotice" hidden>
                Halaman ini khusus tipe pengguna Pelaku Usaha. Akun Fasilitator tidak mengisi profil usaha.
            </div>
            <div class="workspace-alert danger" id="profileNibNotice" hidden>
                Data NIB belum tersedia. <a href="{{ route('simulasi.sihalal.onboarding.nib') }}">Pilih NIB latihan terlebih dahulu</a> agar legalitas usaha dapat ditampilkan.
            </div>
            <div class="workspace-alert success" id="profileSavedNotice" hidden>
                Profil Pelaku Usaha berhasil disimpan dan siap digunakan pada pengajuan Self Declare.
            </div>

            <section class="workspace-card profile-summary">
                <div>
                    <h2 id="profileBusinessName">Profil usaha belum lengkap</h2>
                    <p id="profileBusinessMeta">Lengkapi seluruh bagian profil di bawah ini.</p>
                </div>
                <div class="profile-progress">
                    <div class="profile-progress-head"><span>Kelengkapan profil</span><span id="profilePercentage">0%</span></div>
                    <div class="profile-progress-track"><div class="profile-progress-bar" id="profileProgressBar"></div></div>
                </div>
            </section>

            <form class="profile-form" id="businessProfileForm">
                <section class="workspace-card">
                    <div class="workspace-card-head profile-card-head">
                        <span class="profile-section-icon">@include('simulasi.partials.ikon', ['nama' => 'user'])</span>
                        <div><h2>Penanggung Jawab</h2><p>Kontak utama yang mewakili pelaku usaha.</p></div>
                    </div>
                    <div class="workspace-card-body profile-grid">
                        <div class="profile-field"><label for="responsibleName">Nama Lengkap</label><input class="input" id="responsibleName" data-profile="penanggung_jawab_nama" type="text" maxlength="100" required></div>
                        <div class="profile-field"><label for="responsiblePosition">Jabatan</label><input class="input" id="responsiblePosition" data-profile="penanggung_jawab_jabatan" type="text" maxlength="80" placeholder="Contoh: Pemilik Usaha" required></div>
                        <div class="profile-field"><label for="responsibleEmail">Email</label><input class="input" id="responsibleEmail" data-profile="penanggung_jawab_email" type="email" maxlength="120" required></div>
                        <div class="profile-field"><label for="responsiblePhone">Nomor HP</label><input class="input" id="responsiblePhone" data-profile="penanggung_jawab_telepon" type="tel" inputmode="numeric" maxlength="15" placeholder="08xxxxxxxxxx" required></div>
                    </div>
                </section>

                <section class="workspace-card">
                    <div class="workspace-card-head profile-card-head">
                        <span class="profile-section-icon">@include('simulasi.partials.ikon', ['nama' => 'home'])</span>
                        <div><h2>Data Pabrik</h2><p>Legalitas dan lokasi fasilitas produksi.</p></div>
                    </div>
                    <div class="workspace-card-body profile-grid">
                        <div class="profile-field"><label for="businessName">Nama Usaha</label><input class="input" id="businessName" data-profile="nama_perusahaan" type="text" readonly></div>
                        <div class="profile-field"><label for="businessNib">NIB</label><input class="input" id="businessNib" data-profile="nib" type="text" readonly></div>
                        <div class="profile-field"><label for="businessNpwp">NPWP</label><input class="input" id="businessNpwp" data-profile="npwp" type="text" readonly></div>
                        <div class="profile-field"><label for="factoryName">Nama Pabrik/Fasilitas</label><input class="input" id="factoryName" data-profile="pabrik_nama" type="text" maxlength="120" required></div>
                        <div class="profile-field full"><label for="factoryAddress">Alamat Pabrik/Fasilitas Produksi</label><textarea class="input" id="factoryAddress" data-profile="pabrik_alamat" maxlength="300" required></textarea></div>
                        <div class="profile-field"><label for="factoryProvince">Provinsi</label><input class="input" id="factoryProvince" data-profile="pabrik_provinsi" type="text" maxlength="80" required></div>
                        <div class="profile-field"><label for="factoryCity">Kabupaten/Kota</label><input class="input" id="factoryCity" data-profile="pabrik_kota" type="text" maxlength="80" required></div>
                    </div>
                </section>

                <section class="workspace-card">
                    <div class="workspace-card-head profile-card-head">
                        <span class="profile-section-icon">@include('simulasi.partials.ikon', ['nama' => 'grid'])</span>
                        <div><h2>Data Outlet</h2><p>Lokasi penjualan atau penyajian produk.</p></div>
                    </div>
                    <div class="workspace-card-body profile-grid">
                        <div class="profile-field"><label for="outletName">Nama Outlet</label><input class="input" id="outletName" data-profile="outlet_nama" type="text" maxlength="120" required></div>
                        <div class="profile-field"><label for="outletPhone">Nomor Telepon Outlet</label><input class="input" id="outletPhone" data-profile="outlet_telepon" type="tel" inputmode="numeric" maxlength="15" required></div>
                        <div class="profile-field full"><label for="outletAddress">Alamat Outlet</label><textarea class="input" id="outletAddress" data-profile="outlet_alamat" maxlength="300" required></textarea></div>
                    </div>
                </section>

                <section class="workspace-card">
                    <div class="workspace-card-head profile-card-head">
                        <span class="profile-section-icon">@include('simulasi.partials.ikon', ['nama' => 'shield'])</span>
                        <div><h2>Penyelia Halal</h2><p>Petugas internal yang mengawasi proses produk halal.</p></div>
                    </div>
                    <div class="workspace-card-body profile-grid">
                        <div class="profile-field"><label for="supervisorName">Nama Penyelia Halal</label><input class="input" id="supervisorName" data-profile="penyelia_nama" type="text" maxlength="100" required></div>
                        <div class="profile-field"><label for="supervisorPhone">Nomor HP</label><input class="input" id="supervisorPhone" data-profile="penyelia_telepon" type="tel" inputmode="numeric" maxlength="15" required></div>
                        <div class="profile-field"><label for="supervisorPosition">Jabatan</label><input class="input" id="supervisorPosition" data-profile="penyelia_jabatan" type="text" maxlength="80" required></div>
                        <div class="profile-field"><label for="supervisorCertificate">Nomor Sertifikat Pelatihan</label><input class="input" id="supervisorCertificate" data-profile="penyelia_sertifikat" type="text" maxlength="80" placeholder="Nomor contoh untuk latihan" required></div>
                    </div>
                </section>

                <div class="profile-actions">
                    <p>Perubahan baru digunakan oleh pengajuan setelah profil disimpan.</p>
                    <button type="submit" class="btn btn-primer" id="saveBusinessProfile">Simpan Profil Pelaku Usaha</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        var storageKey = 'sim_sihalal_profil';
        var account = readJson('sim_sihalal') || {};
        var profile = readJson(storageKey) || {};
        var nibData = readJson('sim_sihalal_nib') || {};
        var fields = Array.from(document.querySelectorAll('[data-profile]'));
        var requiredFields = fields.filter(function (field) { return field.required; });
        var form = document.getElementById('businessProfileForm');

        function readJson(key) {
            try { return JSON.parse(sessionStorage.getItem(key) || 'null'); } catch (error) { return null; }
        }

        function mergedValue(key) {
            if (profile[key]) return profile[key];
            if (nibData[key]) return nibData[key];
            if (key === 'pabrik_nama') return profile.nama_perusahaan || nibData.nama_perusahaan || '';
            if (key === 'pabrik_alamat' || key === 'outlet_alamat') return profile.alamat || nibData.alamat || '';
            if (key === 'outlet_nama') return profile.nama_perusahaan || nibData.nama_perusahaan || '';
            return '';
        }

        function updateSummary() {
            var completed = requiredFields.filter(function (field) { return field.value.trim() !== ''; }).length;
            var percentage = requiredFields.length ? Math.round((completed / requiredFields.length) * 100) : 0;
            document.getElementById('profilePercentage').textContent = percentage + '%';
            document.getElementById('profileProgressBar').style.width = percentage + '%';
            document.getElementById('profileBusinessName').textContent = document.getElementById('businessName').value || 'Profil usaha belum lengkap';
            document.getElementById('profileBusinessMeta').textContent = document.getElementById('businessNib').value
                ? 'NIB ' + document.getElementById('businessNib').value + ' · ' + completed + ' dari ' + requiredFields.length + ' data wajib terisi'
                : 'Pilih NIB latihan lalu lengkapi seluruh bagian profil.';
        }

        fields.forEach(function (field) {
            field.value = mergedValue(field.dataset.profile);
            field.addEventListener('input', updateSummary);
        });

        if (account.tipe && account.tipe !== 'Pelaku Usaha') {
            document.getElementById('profileRoleNotice').hidden = false;
            form.querySelectorAll('input, textarea, button').forEach(function (element) { element.disabled = true; });
        }

        if (!document.getElementById('businessNib').value) {
            document.getElementById('profileNibNotice').hidden = false;
            document.getElementById('saveBusinessProfile').disabled = true;
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if (!form.reportValidity()) return;
            fields.forEach(function (field) { profile[field.dataset.profile] = field.value.trim(); });
            ['kategori', 'skala', 'modal_dasar', 'alamat'].forEach(function (key) {
                if (!profile[key] && nibData[key]) profile[key] = nibData[key];
            });
            sessionStorage.setItem(storageKey, JSON.stringify(profile));
            document.getElementById('profileSavedNotice').hidden = false;
            updateSummary();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        updateSummary();
    })();
</script>
@endpush
