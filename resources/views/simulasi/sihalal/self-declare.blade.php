@extends('layouts.simulasi')

@section('title', 'Pengajuan Self Declare')

@push('styles')
    @include('simulasi.partials.workspace-style')
<style>
    .wizard { overflow: hidden; }
    .wizard-progress { display: grid; grid-template-columns: repeat(7, minmax(110px, 1fr)); overflow-x: auto; border-bottom: 1px solid var(--garis); background: #fbf9fc; }
    .wizard-step-button { min-width: 110px; padding: 14px 10px; border: 0; border-bottom: 3px solid transparent; background: transparent; color: var(--abu); font: inherit; font-size: 11px; font-weight: 700; cursor: pointer; }
    .wizard-step-button span { width: 25px; height: 25px; margin: 0 auto 6px; display: grid; place-items: center; border-radius: 50%; background: #ebe7ee; color: #6b6575; }
    .wizard-step-button.active { border-bottom-color: var(--u700); color: var(--u700); }
    .wizard-step-button.active span, .wizard-step-button.done span { background: var(--u700); color: #fff; }
    .wizard-panel { display: none; padding: 24px; }
    .wizard-panel.active { display: block; }
    .wizard-panel h2 { margin: 0 0 6px; font-size: 20px; }
    .wizard-intro { margin: 0 0 22px; color: var(--abu); font-size: 13px; line-height: 1.6; }
    .wizard-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
    .wizard-grid.three { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    .wizard-field label, .wizard-label { display: block; margin-bottom: 7px; color: #44384d; font-size: 12px; font-weight: 700; }
    .wizard-field .input { min-height: 44px; }
    .wizard-field textarea.input { min-height: 94px; resize: vertical; }
    .wizard-field small { display: block; margin-top: 5px; color: var(--abu); font-size: 11px; }
    .question-list { display: grid; gap: 13px; }
    .question { padding: 15px; border: 1px solid var(--garis); border-radius: 11px; background: #fcfbfd; }
    .question strong { display: block; margin-bottom: 10px; font-size: 13px; }
    .choice-row { display: flex; gap: 18px; flex-wrap: wrap; }
    .choice-row label { display: inline-flex; align-items: center; gap: 7px; color: #51475a; font-size: 13px; cursor: pointer; }
    .document-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-top: 20px; }
    .document-card { padding: 15px; display: flex; align-items: center; justify-content: space-between; gap: 12px; border: 1px solid var(--garis); border-radius: 11px; background: #fcfbfd; }
    .document-card b { display: block; margin-bottom: 4px; font-size: 13px; }
    .document-card small { color: var(--abu); font-size: 11px; }
    .inline-form { margin-bottom: 18px; padding: 17px; border: 1px solid var(--u200); border-radius: 12px; background: var(--u50); }
    .form-actions { display: flex; align-items: center; justify-content: flex-end; gap: 10px; margin-top: 16px; }
    .wizard-actions { padding: 16px 24px; display: flex; align-items: center; justify-content: space-between; gap: 12px; border-top: 1px solid var(--garis); background: #fcfbfd; }
    .step-error { display: none; margin: 0 24px 18px; padding: 11px 13px; border-radius: 9px; background: #fff1f2; color: #991b1b; font-size: 12px; }
    .step-error.show { display: block; }
    .material-picks { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 8px; max-height: 170px; padding: 10px; overflow-y: auto; border: 1px solid var(--garis); border-radius: 10px; background: #fff; }
    .material-picks label { display: flex; align-items: center; gap: 7px; font-size: 12px; }
    .review-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; margin-bottom: 20px; }
    .review-card { padding: 15px; border: 1px solid var(--garis); border-radius: 11px; background: #fcfbfd; }
    .review-card span { display: block; color: var(--abu); font-size: 11px; }
    .review-card strong { display: block; margin-top: 4px; font-size: 22px; }
    .review-checklist { display: grid; gap: 9px; }
    .review-item { padding: 11px 13px; display: flex; align-items: center; justify-content: space-between; gap: 14px; border: 1px solid var(--garis); border-radius: 9px; font-size: 13px; }
    .review-item span:last-child { font-weight: 700; }
    .review-item.ready span:last-child { color: #15803d; }
    .review-item.missing span:last-child { color: #b91c1c; }
    .declaration-box { padding: 18px; border: 1px solid var(--u200); border-radius: 12px; background: var(--u50); color: #4c4055; font-size: 13px; line-height: 1.7; }
    .declaration-choice { margin-top: 15px; display: flex; align-items: flex-start; gap: 9px; font-weight: 600; }
    .submitted-card { padding: 55px 24px; text-align: center; }
    .submitted-card .workspace-empty-icon { background: var(--ok-bg); color: var(--ok); }
    @media (max-width: 760px) {
        .wizard-grid, .wizard-grid.three, .document-grid, .review-grid { grid-template-columns: 1fr; }
        .material-picks { grid-template-columns: 1fr; }
        .wizard-panel { padding: 18px; }
        .wizard-actions { padding: 14px 18px; }
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
                    <span class="workspace-eyebrow">Sertifikasi Halal</span>
                    <h1>Pengajuan Self Declare</h1>
                    <p>Latihan pengajuan sertifikasi halal mandiri untuk pelaku usaha mikro dan kecil.</p>
                </div>
                <a href="{{ route('simulasi.sihalal.status') }}" class="btn btn-garis">@include('simulasi.partials.ikon', ['nama' => 'list']) Status Permohonan</a>
            </div>

            <div class="workspace-alert" id="simulationNotice">
                Gunakan data contoh. Semua isian tersimpan sementara di browser dan tidak dikirim ke BPJPH atau server LP3H.
            </div>
            <div class="workspace-alert danger" id="roleNotice" hidden>
                Menu pengajuan hanya tersedia untuk tipe pengguna Pelaku Usaha. Akun Fasilitator digunakan untuk proses pendampingan.
            </div>
            <div class="workspace-alert danger" id="businessNotice" hidden></div>

            <section class="workspace-card" id="emptyState">
                <div class="workspace-empty">
                    <div class="workspace-empty-icon">@include('simulasi.partials.ikon', ['nama' => 'doc'])</div>
                    <h2>Belum ada pengajuan</h2>
                    <p>Mulai dengan menjawab kuesioner kelayakan, lalu lengkapi data pengajuan, bahan, produk, proses produksi, dan pernyataan pelaku usaha.</p>
                    <button type="button" class="btn btn-primer" id="startApplication">Buat Pengajuan Baru</button>
                </div>
            </section>

            <section class="workspace-card submitted-card" id="submittedState" hidden>
                <div class="workspace-empty-icon">@include('simulasi.partials.ikon', ['nama' => 'shield'])</div>
                <h2>Pengajuan sudah dikirim</h2>
                <p>Pengajuan contoh sudah masuk ke tahap pemeriksaan Fasilitator.</p>
                <a href="{{ route('simulasi.sihalal.status') }}" class="btn btn-primer">Lihat Status Permohonan</a>
            </section>

            <section class="workspace-card wizard" id="wizard" hidden>
                <div class="workspace-card-head">
                    <div>
                        <h2 id="applicationNumber">Pengajuan Baru</h2>
                        <span class="workspace-badge warning" id="applicationBadge">Draf</span>
                    </div>
                    <span class="workspace-badge" id="savedIndicator">Tersimpan di browser</span>
                </div>

                <div class="wizard-progress" id="wizardProgress">
                    <button type="button" class="wizard-step-button active" data-step="0"><span>1</span>Kuesioner</button>
                    <button type="button" class="wizard-step-button" data-step="1"><span>2</span>Data Pengajuan</button>
                    <button type="button" class="wizard-step-button" data-step="2"><span>3</span>Bahan</button>
                    <button type="button" class="wizard-step-button" data-step="3"><span>4</span>Produk</button>
                    <button type="button" class="wizard-step-button" data-step="4"><span>5</span>Proses PPH</button>
                    <button type="button" class="wizard-step-button" data-step="5"><span>6</span>Pernyataan</button>
                    <button type="button" class="wizard-step-button" data-step="6"><span>7</span>Kirim</button>
                </div>

                <div class="wizard-panel active" data-panel="0">
                    <h2>Kuesioner Self Declare</h2>
                    <p class="wizard-intro">Jawab seluruh pertanyaan untuk memastikan usaha contoh memenuhi jalur Self Declare.</p>
                    <div class="question-list">
                        <div class="question">
                            <strong>Apakah usaha termasuk kategori Usaha Mikro atau Kecil (UMK)?</strong>
                            <div class="choice-row">
                                <label><input type="radio" name="questionUmk" value="ya"> Ya</label>
                                <label><input type="radio" name="questionUmk" value="tidak"> Tidak</label>
                            </div>
                        </div>
                        <div class="question">
                            <strong>Apakah bahan yang digunakan dapat dipastikan kehalalannya?</strong>
                            <div class="choice-row">
                                <label><input type="radio" name="questionMaterial" value="ya"> Ya</label>
                                <label><input type="radio" name="questionMaterial" value="tidak"> Tidak</label>
                            </div>
                        </div>
                        <div class="question">
                            <strong>Apakah proses produksi sederhana dan dapat dipisahkan dari bahan tidak halal?</strong>
                            <div class="choice-row">
                                <label><input type="radio" name="questionProcess" value="ya"> Ya</label>
                                <label><input type="radio" name="questionProcess" value="tidak"> Tidak</label>
                            </div>
                        </div>
                        <div class="wizard-field">
                            <label for="businessSelect">Pilih usaha contoh yang akan didaftarkan</label>
                            <select id="businessSelect" class="input">
                                <option value="">Pilih data usaha</option>
                                @foreach (config('sihalal.nib_contoh') as $usaha)
                                    <option value="{{ $usaha['nib'] }}" data-category="{{ $usaha['kategori'] }}" data-status="{{ $usaha['status'] }}">{{ $usaha['nama_perusahaan'] }} &mdash; {{ $usaha['nib'] }}</option>
                                @endforeach
                            </select>
                            <small id="businessDescription">Gunakan salah satu NIB fiktif yang tersedia.</small>
                        </div>
                    </div>
                </div>

                <div class="wizard-panel" data-panel="1">
                    <h2>Data Pengajuan</h2>
                    <p class="wizard-intro">Lengkapi identitas pengajuan dan bentuk dokumen permohonan.</p>
                    <div class="wizard-grid">
                        <div class="wizard-field">
                            <label for="applicationBusiness">Nama Usaha</label>
                            <input type="text" id="applicationBusiness" class="input" readonly>
                        </div>
                        <div class="wizard-field">
                            <label for="applicationNib">NIB</label>
                            <input type="text" id="applicationNib" class="input" readonly>
                        </div>
                        <div class="wizard-field">
                            <label for="facilitationCode">Kode Daftar Fasilitasi</label>
                            <input type="text" id="facilitationCode" class="input" placeholder="Contoh: FAS-SD-2025-001">
                            <small>Masukkan kode latihan, bukan kode fasilitasi asli.</small>
                        </div>
                        <div class="wizard-field">
                            <label for="supervisorName">Nama Penyelia Halal</label>
                            <input type="text" id="supervisorName" class="input" placeholder="Nama contoh penyelia halal">
                        </div>
                        <div class="wizard-field">
                            <label for="productCategory">Kategori Produk</label>
                            <select id="productCategory" class="input">
                                <option value="">Pilih kategori</option>
                                <option>Makanan dan Minuman</option>
                                <option>Jasa Penyediaan Makanan</option>
                                <option>Hasil Sembelihan</option>
                            </select>
                        </div>
                        <div class="wizard-field">
                            <label for="businessAddress">Alamat Fasilitas Produksi</label>
                            <textarea id="businessAddress" class="input" placeholder="Alamat contoh fasilitas produksi"></textarea>
                        </div>
                    </div>
                    <div class="document-grid">
                        <div class="document-card">
                            <div><b>Surat Permohonan</b><small id="requestLetterStatus">Belum dibentuk</small></div>
                            <button type="button" class="btn btn-garis btn-kecil" data-document="request">Buat Surat</button>
                        </div>
                        <div class="document-card">
                            <div><b>Surat Pernyataan</b><small id="statementLetterStatus">Belum dibentuk</small></div>
                            <button type="button" class="btn btn-garis btn-kecil" data-document="statement">Buat Surat</button>
                        </div>
                    </div>
                </div>

                <div class="wizard-panel" data-panel="2">
                    <h2>Daftar Bahan</h2>
                    <p class="wizard-intro">Masukkan bahan baku, cleaning agent, dan kemasan yang digunakan.</p>
                    <form class="inline-form" id="materialForm">
                        <div class="wizard-grid three">
                            <div class="wizard-field">
                                <label for="materialType">Jenis Bahan</label>
                                <select id="materialType" class="input" required>
                                    <option value="">Pilih jenis</option>
                                    <option>Bahan Baku</option>
                                    <option>Cleaning Agent</option>
                                    <option>Kemasan</option>
                                </select>
                            </div>
                            <div class="wizard-field">
                                <label for="materialName">Nama Bahan</label>
                                <input type="text" id="materialName" class="input" placeholder="Contoh: Tepung terigu" required>
                            </div>
                            <div class="wizard-field">
                                <label for="materialBrand">Merek</label>
                                <input type="text" id="materialBrand" class="input" placeholder="Merek contoh" required>
                            </div>
                            <div class="wizard-field">
                                <label for="materialProducer">Produsen</label>
                                <input type="text" id="materialProducer" class="input" placeholder="Produsen contoh" required>
                            </div>
                            <div class="wizard-field">
                                <label for="materialCertificate">Nomor Sertifikat Halal</label>
                                <input type="text" id="materialCertificate" class="input" placeholder="Opsional untuk bahan tertentu">
                            </div>
                        </div>
                        <div class="form-actions"><button type="submit" class="btn btn-primer btn-kecil">Tambah Bahan</button></div>
                    </form>
                    <div class="workspace-table-wrap">
                        <table class="workspace-table">
                            <thead><tr><th>Jenis</th><th>Bahan</th><th>Merek / Produsen</th><th>Sertifikat</th><th>Aksi</th></tr></thead>
                            <tbody id="materialTable"></tbody>
                        </table>
                    </div>
                </div>

                <div class="wizard-panel" data-panel="3">
                    <h2>Daftar Produk</h2>
                    <p class="wizard-intro">Tambahkan produk, foto contoh, dan bahan yang digunakan pada setiap produk.</p>
                    <form class="inline-form" id="productForm">
                        <div class="wizard-grid">
                            <div class="wizard-field">
                                <label for="productName">Nama Produk</label>
                                <input type="text" id="productName" class="input" placeholder="Contoh: Roti cokelat" required>
                            </div>
                            <div class="wizard-field">
                                <label for="productVariant">Varian / Merek</label>
                                <input type="text" id="productVariant" class="input" placeholder="Varian contoh" required>
                            </div>
                            <div class="wizard-field">
                                <label for="productPhoto">Foto Produk</label>
                                <input type="file" id="productPhoto" class="input" accept="image/png,image/jpeg,image/webp">
                                <small>File tidak diunggah; simulasi hanya membaca nama file.</small>
                            </div>
                            <div class="wizard-field">
                                <span class="wizard-label">Bahan yang Digunakan</span>
                                <div class="material-picks" id="materialPicks"></div>
                            </div>
                        </div>
                        <div class="form-actions"><button type="submit" class="btn btn-primer btn-kecil">Tambah Produk</button></div>
                    </form>
                    <div class="workspace-table-wrap">
                        <table class="workspace-table">
                            <thead><tr><th>Produk</th><th>Foto</th><th>Bahan</th><th>Aksi</th></tr></thead>
                            <tbody id="productTable"></tbody>
                        </table>
                    </div>
                </div>

                <div class="wizard-panel" data-panel="4">
                    <h2>Proses Produksi Halal</h2>
                    <p class="wizard-intro">Tuliskan setiap proses secara singkat, jelas, dan berurutan.</p>
                    <form class="inline-form" id="processForm">
                        <div class="wizard-grid">
                            <div class="wizard-field">
                                <label for="processName">Nama Tahap</label>
                                <input type="text" id="processName" class="input" placeholder="Contoh: Persiapan bahan" required>
                            </div>
                            <div class="wizard-field">
                                <label for="processDescription">Uraian Proses</label>
                                <textarea id="processDescription" class="input" placeholder="Jelaskan proses secara singkat" required></textarea>
                            </div>
                        </div>
                        <div class="form-actions"><button type="submit" class="btn btn-primer btn-kecil">Tambah Proses</button></div>
                    </form>
                    <div class="workspace-table-wrap">
                        <table class="workspace-table">
                            <thead><tr><th>Urutan</th><th>Tahap</th><th>Uraian</th><th>Aksi</th></tr></thead>
                            <tbody id="processTable"></tbody>
                        </table>
                    </div>
                </div>

                <div class="wizard-panel" data-panel="5">
                    <h2>Pernyataan Pelaku Usaha</h2>
                    <p class="wizard-intro">Baca pernyataan berikut, setujui, lalu unduh ikrar contoh.</p>
                    <div class="declaration-box">
                        Saya menyatakan bahwa data latihan yang diisikan pada simulasi ini benar untuk kebutuhan pembelajaran, bahan yang dicantumkan dapat ditelusuri, dan proses produksi dijaga sesuai ketentuan halal.
                        <label class="declaration-choice"><input type="checkbox" id="declarationAgreement"> Saya telah membaca dan menyetujui pernyataan pelaku usaha.</label>
                    </div>
                    <div class="form-actions">
                        <span class="workspace-badge warning" id="pledgeStatus">Ikrar belum diunduh</span>
                        <button type="button" class="btn btn-primer" id="downloadPledge">Unduh Ikrar Contoh</button>
                    </div>
                </div>

                <div class="wizard-panel" data-panel="6">
                    <h2>Periksa dan Kirim</h2>
                    <p class="wizard-intro">Pastikan seluruh bagian lengkap sebelum pengajuan dikirim ke Fasilitator.</p>
                    <div class="review-grid">
                        <div class="review-card"><span>Total Bahan</span><strong id="reviewMaterialCount">0</strong></div>
                        <div class="review-card"><span>Total Produk</span><strong id="reviewProductCount">0</strong></div>
                        <div class="review-card"><span>Tahap Produksi</span><strong id="reviewProcessCount">0</strong></div>
                    </div>
                    <div class="review-checklist" id="reviewChecklist"></div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-primer" id="submitApplication">Kirim Pengajuan</button>
                    </div>
                </div>

                <div class="step-error" id="stepError" role="alert"></div>
                <div class="wizard-actions">
                    <button type="button" class="btn btn-garis" id="previousStep">Sebelumnya</button>
                    <button type="button" class="btn btn-primer" id="nextStep">Simpan &amp; Lanjut</button>
                </div>
            </section>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        var storageKey = 'sim_sihalal_self_declare';
        var statusUrl = @json(route('simulasi.sihalal.status'));
        var businesses = @json(config('sihalal.nib_contoh'));
        var state = readJson(storageKey);
        var account = readJson('sim_sihalal') || {};
        var profile = readJson('sim_sihalal_profil') || {};
        var currentStep = state ? Number(state.step || 0) : 0;

        function readJson(key) {
            try { return JSON.parse(sessionStorage.getItem(key) || 'null'); } catch (error) { return null; }
        }

        function createState() {
            var suffix = String(Date.now()).slice(-6);
            var profileBusiness = businesses.find(function (item) { return item.nib === profile.nib; }) || null;
            return {
                number: 'SD-' + new Date().getFullYear() + '-' + suffix,
                status: 'draft',
                step: 0,
                questionnaire: { umk: '', material: '', process: '' },
                business: profileBusiness,
                data: {
                    facilitationCode: '',
                    supervisorName: profile.penyelia_nama || '',
                    productCategory: '',
                    businessAddress: profile.pabrik_alamat || profile.alamat || ''
                },
                documents: { request: false, statement: false },
                materials: [],
                products: [],
                processes: [],
                declaration: { agreed: false, pledgeDownloaded: false },
                submittedAt: null
            };
        }

        function saveState() {
            state.step = currentStep;
            sessionStorage.setItem(storageKey, JSON.stringify(state));
            var indicator = document.getElementById('savedIndicator');
            indicator.textContent = 'Tersimpan di browser';
            indicator.className = 'workspace-badge success';
        }

        function accountCanApply() {
            return !account.tipe || account.tipe === 'Pelaku Usaha';
        }

        function profileCanApply() {
            return !profile.kategori || profile.kategori === 'UMK';
        }

        function showInitialState() {
            if (!accountCanApply()) {
                document.getElementById('roleNotice').hidden = false;
                document.getElementById('startApplication').disabled = true;
            }
            if (!profileCanApply()) {
                var notice = document.getElementById('businessNotice');
                notice.textContent = 'Profil usaha yang dipilih berkategori Non UMK sehingga tidak memenuhi jalur Self Declare.';
                notice.hidden = false;
                document.getElementById('startApplication').disabled = true;
            }
            if (!state) return;
            document.getElementById('emptyState').hidden = true;
            if (state.status === 'submitted') {
                document.getElementById('submittedState').hidden = false;
                return;
            }
            document.getElementById('wizard').hidden = false;
            restoreForm();
            renderAll();
            showStep(currentStep);
        }

        function selectedValue(name) {
            var selected = document.querySelector('input[name="' + name + '"]:checked');
            return selected ? selected.value : '';
        }

        function checkRadio(name, value) {
            var input = document.querySelector('input[name="' + name + '"][value="' + value + '"]');
            if (input) input.checked = true;
        }

        function captureStep(step) {
            if (step === 0) {
                state.questionnaire.umk = selectedValue('questionUmk');
                state.questionnaire.material = selectedValue('questionMaterial');
                state.questionnaire.process = selectedValue('questionProcess');
                state.business = businesses.find(function (item) { return item.nib === document.getElementById('businessSelect').value; }) || null;
            }
            if (step === 1) {
                state.data.facilitationCode = document.getElementById('facilitationCode').value.trim();
                state.data.supervisorName = document.getElementById('supervisorName').value.trim();
                state.data.productCategory = document.getElementById('productCategory').value;
                state.data.businessAddress = document.getElementById('businessAddress').value.trim();
            }
            if (step === 5) {
                state.declaration.agreed = document.getElementById('declarationAgreement').checked;
            }
            saveState();
        }

        function restoreForm() {
            checkRadio('questionUmk', state.questionnaire.umk);
            checkRadio('questionMaterial', state.questionnaire.material);
            checkRadio('questionProcess', state.questionnaire.process);
            document.getElementById('businessSelect').value = state.business ? state.business.nib : '';
            document.getElementById('facilitationCode').value = state.data.facilitationCode || '';
            document.getElementById('supervisorName').value = state.data.supervisorName || '';
            document.getElementById('productCategory').value = state.data.productCategory || '';
            document.getElementById('businessAddress').value = state.data.businessAddress || '';
            document.getElementById('declarationAgreement').checked = Boolean(state.declaration.agreed);
            syncBusinessFields();
        }

        function syncBusinessFields() {
            document.getElementById('applicationBusiness').value = state && state.business ? state.business.nama_perusahaan : '';
            document.getElementById('applicationNib').value = state && state.business ? state.business.nib : '';
            if (state && state.business && !document.getElementById('businessAddress').value) {
                document.getElementById('businessAddress').value = state.business.alamat;
            }
        }

        function validationMessage(step) {
            if (step === 0) {
                if (!state.questionnaire.umk || !state.questionnaire.material || !state.questionnaire.process || !state.business) return 'Jawab seluruh kuesioner dan pilih usaha contoh.';
                if (state.questionnaire.umk !== 'ya' || state.questionnaire.material !== 'ya' || state.questionnaire.process !== 'ya') return 'Jawaban belum memenuhi kriteria jalur Self Declare.';
                if (state.business.kategori !== 'UMK') return 'Usaha Non UMK harus menggunakan jalur reguler.';
                if (state.business.status !== 'tersedia') return 'NIB contoh tersebut sudah digunakan. Pilih usaha lain.';
            }
            if (step === 1 && (!state.data.facilitationCode || !state.data.supervisorName || !state.data.productCategory || !state.data.businessAddress || !state.documents.request || !state.documents.statement)) return 'Lengkapi data pengajuan dan bentuk kedua surat.';
            if (step === 2 && state.materials.length === 0) return 'Tambahkan minimal satu bahan.';
            if (step === 3 && (state.products.length === 0 || state.products.some(function (product) { return product.materialIds.length === 0; }))) return 'Tambahkan minimal satu produk dan pilih bahan yang digunakan.';
            if (step === 4 && state.processes.length === 0) return 'Tambahkan minimal satu tahap proses produksi.';
            if (step === 5 && (!state.declaration.agreed || !state.declaration.pledgeDownloaded)) return 'Setujui pernyataan dan unduh ikrar contoh.';
            return '';
        }

        function validateStep(step, showError) {
            captureStep(step);
            var message = validationMessage(step);
            if (showError) setError(message);
            return message === '';
        }

        function setError(message) {
            var error = document.getElementById('stepError');
            error.textContent = message;
            error.classList.toggle('show', Boolean(message));
        }

        function showStep(step) {
            currentStep = Math.max(0, Math.min(6, step));
            document.querySelectorAll('.wizard-panel').forEach(function (panel) {
                panel.classList.toggle('active', Number(panel.dataset.panel) === currentStep);
            });
            document.querySelectorAll('.wizard-step-button').forEach(function (button) {
                var buttonStep = Number(button.dataset.step);
                button.classList.toggle('active', buttonStep === currentStep);
                button.classList.toggle('done', buttonStep < currentStep && validationMessage(buttonStep) === '');
            });
            document.getElementById('previousStep').disabled = currentStep === 0;
            document.getElementById('nextStep').hidden = currentStep === 6;
            setError('');
            if (currentStep === 3) renderMaterialPicks();
            if (currentStep === 6) renderReview();
            saveState();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function createCell(text) {
            var cell = document.createElement('td');
            cell.textContent = text;
            return cell;
        }

        function createDeleteButton(index, type) {
            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'workspace-icon-button';
            button.textContent = '×';
            button.setAttribute('aria-label', 'Hapus');
            button.dataset.index = String(index);
            button.dataset.remove = type;
            return button;
        }

        function renderMaterials() {
            var body = document.getElementById('materialTable');
            body.replaceChildren();
            if (state.materials.length === 0) {
                var row = document.createElement('tr');
                var cell = createCell('Belum ada bahan.');
                cell.colSpan = 5;
                cell.className = 'workspace-table-empty';
                row.appendChild(cell);
                body.appendChild(row);
                return;
            }
            state.materials.forEach(function (material, index) {
                var row = document.createElement('tr');
                row.appendChild(createCell(material.type));
                row.appendChild(createCell(material.name));
                row.appendChild(createCell(material.brand + ' / ' + material.producer));
                row.appendChild(createCell(material.certificate || 'Tidak dicantumkan'));
                var action = document.createElement('td');
                action.appendChild(createDeleteButton(index, 'material'));
                row.appendChild(action);
                body.appendChild(row);
            });
        }

        function renderMaterialPicks() {
            var wrap = document.getElementById('materialPicks');
            wrap.replaceChildren();
            if (state.materials.length === 0) {
                var empty = document.createElement('span');
                empty.textContent = 'Tambahkan bahan terlebih dahulu.';
                wrap.appendChild(empty);
                return;
            }
            state.materials.forEach(function (material) {
                var label = document.createElement('label');
                var input = document.createElement('input');
                input.type = 'checkbox';
                input.name = 'productMaterial';
                input.value = material.id;
                label.appendChild(input);
                label.appendChild(document.createTextNode(material.name));
                wrap.appendChild(label);
            });
        }

        function materialNames(ids) {
            return ids.map(function (id) {
                var material = state.materials.find(function (item) { return item.id === id; });
                return material ? material.name : '';
            }).filter(Boolean).join(', ');
        }

        function renderProducts() {
            var body = document.getElementById('productTable');
            body.replaceChildren();
            if (state.products.length === 0) {
                var row = document.createElement('tr');
                var cell = createCell('Belum ada produk.');
                cell.colSpan = 4;
                cell.className = 'workspace-table-empty';
                row.appendChild(cell);
                body.appendChild(row);
                return;
            }
            state.products.forEach(function (product, index) {
                var row = document.createElement('tr');
                row.appendChild(createCell(product.name + ' — ' + product.variant));
                row.appendChild(createCell(product.photo || 'Tanpa foto contoh'));
                row.appendChild(createCell(materialNames(product.materialIds)));
                var action = document.createElement('td');
                action.appendChild(createDeleteButton(index, 'product'));
                row.appendChild(action);
                body.appendChild(row);
            });
        }

        function renderProcesses() {
            var body = document.getElementById('processTable');
            body.replaceChildren();
            if (state.processes.length === 0) {
                var row = document.createElement('tr');
                var cell = createCell('Belum ada proses produksi.');
                cell.colSpan = 4;
                cell.className = 'workspace-table-empty';
                row.appendChild(cell);
                body.appendChild(row);
                return;
            }
            state.processes.forEach(function (process, index) {
                var row = document.createElement('tr');
                row.appendChild(createCell(String(index + 1)));
                row.appendChild(createCell(process.name));
                row.appendChild(createCell(process.description));
                var action = document.createElement('td');
                action.appendChild(createDeleteButton(index, 'process'));
                row.appendChild(action);
                body.appendChild(row);
            });
        }

        function renderDocuments() {
            document.getElementById('requestLetterStatus').textContent = state.documents.request ? 'Sudah terbentuk' : 'Belum dibentuk';
            document.getElementById('statementLetterStatus').textContent = state.documents.statement ? 'Sudah terbentuk' : 'Belum dibentuk';
            document.getElementById('pledgeStatus').textContent = state.declaration.pledgeDownloaded ? 'Ikrar sudah diunduh' : 'Ikrar belum diunduh';
            document.getElementById('pledgeStatus').className = state.declaration.pledgeDownloaded ? 'workspace-badge success' : 'workspace-badge warning';
        }

        function renderReview() {
            document.getElementById('reviewMaterialCount').textContent = String(state.materials.length);
            document.getElementById('reviewProductCount').textContent = String(state.products.length);
            document.getElementById('reviewProcessCount').textContent = String(state.processes.length);
            var items = [
                ['Kuesioner kelayakan', validationMessage(0) === ''],
                ['Data dan surat pengajuan', validationMessage(1) === ''],
                ['Daftar bahan', validationMessage(2) === ''],
                ['Produk dan penggunaan bahan', validationMessage(3) === ''],
                ['Proses produksi halal', validationMessage(4) === ''],
                ['Pernyataan dan ikrar', validationMessage(5) === '']
            ];
            var list = document.getElementById('reviewChecklist');
            list.replaceChildren();
            items.forEach(function (item) {
                var row = document.createElement('div');
                row.className = 'review-item ' + (item[1] ? 'ready' : 'missing');
                row.appendChild(document.createTextNode(item[0]));
                var status = document.createElement('span');
                status.textContent = item[1] ? 'Lengkap' : 'Belum lengkap';
                row.appendChild(status);
                list.appendChild(row);
            });
        }

        function renderAll() {
            document.getElementById('applicationNumber').textContent = state.number;
            renderMaterials();
            renderProducts();
            renderProcesses();
            renderDocuments();
            renderMaterialPicks();
            renderReview();
        }

        function downloadText(filename, title, content) {
            var blob = new Blob([title + '\n\n' + content], { type: 'text/plain;charset=utf-8' });
            var url = URL.createObjectURL(blob);
            var link = document.createElement('a');
            link.href = url;
            link.download = filename;
            link.click();
            URL.revokeObjectURL(url);
        }

        document.getElementById('startApplication').addEventListener('click', function () {
            if (!accountCanApply() || !profileCanApply()) return;
            state = createState();
            currentStep = 0;
            document.getElementById('emptyState').hidden = true;
            document.getElementById('wizard').hidden = false;
            restoreForm();
            renderAll();
            showStep(0);
        });

        document.getElementById('businessSelect').addEventListener('change', function () {
            state.business = businesses.find(function (item) { return item.nib === this.value; }, this) || null;
            var description = document.getElementById('businessDescription');
            description.textContent = state.business ? state.business.skenario : 'Gunakan salah satu NIB fiktif yang tersedia.';
            syncBusinessFields();
            saveState();
        });

        document.querySelectorAll('[data-document]').forEach(function (button) {
            button.addEventListener('click', function () {
                captureStep(1);
                var type = button.dataset.document;
                state.documents[type] = true;
                var title = type === 'request' ? 'Surat Permohonan Self Declare' : 'Surat Pernyataan Pelaku Usaha';
                var filename = type === 'request' ? 'surat-permohonan-contoh.txt' : 'surat-pernyataan-contoh.txt';
                downloadText(filename, title, 'Nomor Pengajuan: ' + state.number + '\nUsaha: ' + (state.business ? state.business.nama_perusahaan : '-') + '\nDokumen simulasi, bukan dokumen resmi.');
                saveState();
                renderDocuments();
                tampilkanToast(title + ' berhasil dibentuk.');
            });
        });

        document.getElementById('materialForm').addEventListener('submit', function (event) {
            event.preventDefault();
            state.materials.push({
                id: 'material-' + Date.now(),
                type: document.getElementById('materialType').value,
                name: document.getElementById('materialName').value.trim(),
                brand: document.getElementById('materialBrand').value.trim(),
                producer: document.getElementById('materialProducer').value.trim(),
                certificate: document.getElementById('materialCertificate').value.trim()
            });
            event.currentTarget.reset();
            saveState();
            renderMaterials();
            renderMaterialPicks();
            tampilkanToast('Bahan berhasil ditambahkan.');
        });

        document.getElementById('productForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var materialIds = Array.from(document.querySelectorAll('input[name="productMaterial"]:checked')).map(function (input) { return input.value; });
            if (materialIds.length === 0) {
                tampilkanToast('Pilih minimal satu bahan untuk produk.');
                return;
            }
            var photo = document.getElementById('productPhoto').files[0];
            state.products.push({
                id: 'product-' + Date.now(),
                name: document.getElementById('productName').value.trim(),
                variant: document.getElementById('productVariant').value.trim(),
                photo: photo ? photo.name : '',
                materialIds: materialIds
            });
            event.currentTarget.reset();
            saveState();
            renderProducts();
            renderMaterialPicks();
            tampilkanToast('Produk berhasil ditambahkan.');
        });

        document.getElementById('processForm').addEventListener('submit', function (event) {
            event.preventDefault();
            state.processes.push({
                id: 'process-' + Date.now(),
                name: document.getElementById('processName').value.trim(),
                description: document.getElementById('processDescription').value.trim()
            });
            event.currentTarget.reset();
            saveState();
            renderProcesses();
            tampilkanToast('Tahap produksi berhasil ditambahkan.');
        });

        document.addEventListener('click', function (event) {
            var button = event.target.closest('[data-remove]');
            if (!button || !state) return;
            var index = Number(button.dataset.index);
            if (button.dataset.remove === 'material') {
                var removedId = state.materials[index].id;
                state.materials.splice(index, 1);
                state.products.forEach(function (product) {
                    product.materialIds = product.materialIds.filter(function (id) { return id !== removedId; });
                });
            }
            if (button.dataset.remove === 'product') state.products.splice(index, 1);
            if (button.dataset.remove === 'process') state.processes.splice(index, 1);
            saveState();
            renderAll();
        });

        document.getElementById('declarationAgreement').addEventListener('change', function () {
            state.declaration.agreed = this.checked;
            saveState();
        });

        document.getElementById('downloadPledge').addEventListener('click', function () {
            state.declaration.pledgeDownloaded = true;
            downloadText('ikrar-pelaku-usaha-contoh.txt', 'Ikrar Pelaku Usaha', 'Nomor Pengajuan: ' + state.number + '\nDokumen simulasi untuk kebutuhan pelatihan.');
            saveState();
            renderDocuments();
        });

        document.getElementById('previousStep').addEventListener('click', function () {
            captureStep(currentStep);
            showStep(currentStep - 1);
        });

        document.getElementById('nextStep').addEventListener('click', function () {
            if (validateStep(currentStep, true)) showStep(currentStep + 1);
        });

        document.querySelectorAll('.wizard-step-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var target = Number(button.dataset.step);
                captureStep(currentStep);
                if (target <= currentStep || validateStep(currentStep, true)) showStep(target);
            });
        });

        document.getElementById('submitApplication').addEventListener('click', function () {
            captureStep(6);
            for (var step = 0; step < 6; step += 1) {
                var message = validationMessage(step);
                if (message) {
                    showStep(step);
                    setError(message);
                    return;
                }
            }
            state.status = 'submitted';
            state.submittedAt = new Date().toISOString();
            saveState();
            window.location.assign(statusUrl);
        });

        showInitialState();
    })();
</script>
@endpush
