<div class="workspace-topbar">
    <button type="button" class="workspace-menu-button" id="workspaceMenuButton" aria-label="Buka menu">&#9776;</button>
    <a href="{{ route('pelatihan_sihalal') }}" class="workspace-documentation">@include('simulasi.partials.ikon', ['nama' => 'book']) PANDUAN PELATIHAN</a>
    <span class="workspace-language">ID &#9662;</span>
    <a href="{{ route('simulasi.sihalal.login') }}" class="workspace-avatar" title="Keluar">@include('simulasi.partials.ikon', ['nama' => 'user'])</a>
</div>

@push('scripts')
<script>
    document.getElementById('workspaceMenuButton').addEventListener('click', function () {
        document.getElementById('workspaceSidebar').classList.toggle('open');
    });
</script>
@endpush
