@extends('layouts.simulasi')

@section('title', 'Pilih Asal Pelaku Usaha')

@push('styles')
    @include('simulasi.partials.onboarding-style')
@endpush

@section('body')
<script>
    try {
        if (sessionStorage.getItem('sim_sihalal_profil')) {
            window.location.replace(@json(route('simulasi.sihalal.dashboard')));
        }
    } catch (e) {}
</script>

<div class="ob-wrap">
    <div class="ob-logo"><span class="kotak">SH</span> SiHalal</div>

    <div class="ob-kartu sempit">
        <h1 class="ob-judul" style="margin-bottom:16px">Pilih Asal Pelaku Usaha</h1>

        <form id="formAsal" onsubmit="return false">
            <label class="opsi"><span>Luar Negeri</span><input type="radio" name="asal" value="luar"></label>
            <label class="opsi"><span>Dalam Negeri</span><input type="radio" name="asal" value="dalam"></label>
            <label class="opsi"><span>Instansi Pemerintah</span><input type="radio" name="asal" value="instansi"></label>

            <button type="button" id="btnLanjut" class="btn btn-primer btn-blok" style="margin-top:8px" disabled>Selanjutnya &rarr;</button>
            <a href="{{ route('simulasi.sihalal.login') }}" class="btn btn-garis btn-blok" style="margin-top:10px">&larr; Kembali Ke Halaman Login</a>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        var btn = document.getElementById('btnLanjut');
        var radios = document.querySelectorAll('input[name="asal"]');
        function pilihan() {
            var c = document.querySelector('input[name="asal"]:checked');
            return c ? c.value : null;
        }
        radios.forEach(function (r) { r.addEventListener('change', function () { btn.disabled = !pilihan(); }); });

        btn.addEventListener('click', function () {
            if (pilihan() === 'dalam') {
                window.location.href = @json(route('simulasi.sihalal.onboarding.nib'));
            } else {
                tampilkanToast('Pilihan ini belum tersedia di simulasi. Silakan pilih "Dalam Negeri".');
            }
        });
    })();
</script>
@endpush
