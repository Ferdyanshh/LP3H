@extends('layouts.simulasi')

@section('title', 'Status Permohonan')

@push('styles')
    @include('simulasi.partials.workspace-style')
<style>
    .status-overview { display: grid; grid-template-columns: 1.3fr .7fr; gap: 18px; margin-bottom: 18px; }
    .status-summary { padding: 22px; }
    .status-summary-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 18px; }
    .status-summary h2 { margin: 0 0 7px; font-size: 22px; }
    .status-summary p { margin: 0; color: var(--abu); font-size: 13px; }
    .status-meta { margin-top: 22px; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 13px; }
    .status-meta div { padding: 12px; border-radius: 10px; background: var(--u50); }
    .status-meta span { display: block; color: var(--abu); font-size: 11px; }
    .status-meta strong { display: block; margin-top: 4px; font-size: 13px; }
    .status-progress { padding: 22px; }
    .status-progress strong { display: block; margin-bottom: 10px; font-size: 14px; }
    .progress-track { height: 10px; overflow: hidden; border-radius: 999px; background: #e9e5ec; }
    .progress-value { width: 0; height: 100%; border-radius: inherit; background: linear-gradient(90deg, var(--u700), #a855f7); transition: width .3s; }
    .progress-copy { margin-top: 10px; display: flex; justify-content: space-between; color: var(--abu); font-size: 12px; }
    .timeline { padding: 22px; }
    .timeline-item { padding: 0 0 22px 34px; position: relative; }
    .timeline-item:last-child { padding-bottom: 0; }
    .timeline-item::before { content: ''; width: 12px; height: 12px; position: absolute; left: 1px; top: 3px; border: 3px solid #d9d2dd; border-radius: 50%; background: #fff; z-index: 2; }
    .timeline-item:not(:last-child)::after { content: ''; width: 2px; position: absolute; left: 8px; top: 18px; bottom: 2px; background: #e5e0e8; }
    .timeline-item.done::before { border-color: var(--u700); background: var(--u700); }
    .timeline-item.current::before { border-color: #f59e0b; background: #fef3c7; }
    .timeline-item b { display: block; margin-bottom: 4px; font-size: 13px; }
    .timeline-item span { color: var(--abu); font-size: 12px; }
    .status-actions { display: flex; gap: 10px; flex-wrap: wrap; }
    @media (max-width: 800px) {
        .status-overview { grid-template-columns: 1fr; }
        .status-meta { grid-template-columns: 1fr; }
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
                    <h1>Status Permohonan</h1>
                    <p>Pantau perkembangan pengajuan Self Declare yang disimpan pada browser ini.</p>
                </div>
                <a href="{{ route('simulasi.sihalal.self-declare') }}" class="btn btn-primer">@include('simulasi.partials.ikon', ['nama' => 'id']) Pengajuan Self Declare</a>
            </div>

            <div class="workspace-alert">Status berikut hanya bagian dari simulasi pelatihan dan tidak terhubung dengan sistem resmi BPJPH.</div>

            <section class="workspace-card" id="noApplication">
                <div class="workspace-empty">
                    <div class="workspace-empty-icon">@include('simulasi.partials.ikon', ['nama' => 'list'])</div>
                    <h2>Belum ada permohonan</h2>
                    <p>Buat pengajuan Self Declare terlebih dahulu untuk melihat progres dan status pemeriksaannya.</p>
                    <a href="{{ route('simulasi.sihalal.self-declare') }}" class="btn btn-primer">Buat Pengajuan</a>
                </div>
            </section>

            <div id="applicationStatus" hidden>
                <div class="status-overview">
                    <section class="workspace-card status-summary">
                        <div class="status-summary-top">
                            <div>
                                <h2 id="statusNumber">-</h2>
                                <p id="statusBusiness">-</p>
                            </div>
                            <span class="workspace-badge warning" id="statusBadge">Draf</span>
                        </div>
                        <div class="status-meta">
                            <div><span>NIB</span><strong id="statusNib">-</strong></div>
                            <div><span>Kode Fasilitasi</span><strong id="statusFacilitation">-</strong></div>
                            <div><span>Tanggal Pengiriman</span><strong id="statusDate">Belum dikirim</strong></div>
                            <div><span>Tahap Saat Ini</span><strong id="statusStage">Melengkapi data</strong></div>
                        </div>
                    </section>

                    <section class="workspace-card status-progress">
                        <strong>Kelengkapan Pengajuan</strong>
                        <div class="progress-track"><div class="progress-value" id="progressValue"></div></div>
                        <div class="progress-copy"><span id="progressText">0 dari 6 bagian</span><b id="progressPercent">0%</b></div>
                        <div class="status-actions" style="margin-top:22px">
                            <a href="{{ route('simulasi.sihalal.self-declare') }}" class="btn btn-garis btn-kecil" id="editApplication">Lanjutkan Pengajuan</a>
                        </div>
                    </section>
                </div>

                <section class="workspace-card">
                    <div class="workspace-card-head"><h2>Riwayat Status</h2></div>
                    <div class="timeline" id="statusTimeline"></div>
                </section>
            </div>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        var state = null;
        try { state = JSON.parse(sessionStorage.getItem('sim_sihalal_self_declare') || 'null'); } catch (error) {}
        if (!state) return;

        document.getElementById('noApplication').hidden = true;
        document.getElementById('applicationStatus').hidden = false;
        document.getElementById('statusNumber').textContent = state.number;
        document.getElementById('statusBusiness').textContent = state.business ? state.business.nama_perusahaan : 'Usaha belum dipilih';
        document.getElementById('statusNib').textContent = state.business ? state.business.nib : '-';
        document.getElementById('statusFacilitation').textContent = state.data.facilitationCode || 'Belum diisi';

        var checks = [
            state.questionnaire.umk === 'ya' && state.questionnaire.material === 'ya' && state.questionnaire.process === 'ya' && Boolean(state.business),
            Boolean(state.data.facilitationCode && state.data.supervisorName && state.data.productCategory && state.data.businessAddress && state.documents.request && state.documents.statement),
            state.materials.length > 0,
            state.products.length > 0 && state.products.every(function (product) { return product.materialIds.length > 0; }),
            state.processes.length > 0,
            Boolean(state.declaration.agreed && state.declaration.pledgeDownloaded)
        ];
        var completed = checks.filter(Boolean).length;
        var percent = Math.round((completed / checks.length) * 100);
        document.getElementById('progressValue').style.width = percent + '%';
        document.getElementById('progressText').textContent = completed + ' dari 6 bagian';
        document.getElementById('progressPercent').textContent = percent + '%';

        var submitted = state.status === 'submitted';
        var badge = document.getElementById('statusBadge');
        badge.textContent = submitted ? 'Dikirim ke Fasilitator' : 'Draf';
        badge.className = submitted ? 'workspace-badge success' : 'workspace-badge warning';
        document.getElementById('statusStage').textContent = submitted ? 'Pemeriksaan Fasilitator' : 'Melengkapi pengajuan';
        document.getElementById('editApplication').textContent = submitted ? 'Lihat Pengajuan' : 'Lanjutkan Pengajuan';

        if (state.submittedAt) {
            document.getElementById('statusDate').textContent = new Intl.DateTimeFormat('id-ID', { dateStyle: 'long', timeStyle: 'short' }).format(new Date(state.submittedAt));
        }

        var timelineItems = [
            ['Draf dibuat', 'Pengajuan contoh tersimpan di browser.', true, false],
            ['Data pengajuan lengkap', completed === 6 ? 'Seluruh bagian pengajuan telah dilengkapi.' : 'Lengkapi semua bagian sebelum mengirim.', completed === 6, !submitted && completed < 6],
            ['Dikirim ke Fasilitator', submitted ? 'Pengajuan menunggu pemeriksaan Fasilitator.' : 'Belum dikirim.', submitted, submitted],
            ['Verifikasi dan penetapan', 'Tahap lanjutan ditampilkan sebagai gambaran alur pelatihan.', false, false]
        ];
        var timeline = document.getElementById('statusTimeline');
        timelineItems.forEach(function (item) {
            var row = document.createElement('div');
            row.className = 'timeline-item' + (item[2] ? ' done' : '') + (item[3] ? ' current' : '');
            var title = document.createElement('b');
            title.textContent = item[0];
            var description = document.createElement('span');
            description.textContent = item[1];
            row.appendChild(title);
            row.appendChild(description);
            timeline.appendChild(row);
        });
    })();
</script>
@endpush
