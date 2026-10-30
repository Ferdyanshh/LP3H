<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SiHalal') - Simulasi LP3H</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --u900: #3d1651; --u800: #4b1d5e; --u700: #6b2a85; --u600: #7a2f94; --u500: #9b5fb0;
            --u200: #e6d6ee; --u100: #f1e8f6; --u50: #f7f3fa;
            --teks: #2d2438; --abu: #6b6575; --garis: #e7e3ec; --bg: #f6f5f9;
            --ok: #16a34a; --ok-bg: #e3f8e9;
        }
        * { box-sizing: border-box; }
        html, body { margin: 0; }
        body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif; color: var(--teks); background: var(--bg); }
        a { color: inherit; }
        .ik { width: 1.15em; height: 1.15em; flex: none; }

        .sim-banner { position: sticky; top: 0; z-index: 100; background: #facc15; color: #422006; font-size: 13px; font-weight: 600;
            padding: 8px 16px; display: flex; gap: 12px; align-items: center; justify-content: center; flex-wrap: wrap; text-align: center; }
        .sim-banner a { text-decoration: underline; font-weight: 700; }

        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; border-radius: 10px; font: inherit; font-weight: 600;
            padding: 12px 20px; border: 1.5px solid var(--u700); cursor: pointer; text-decoration: none; transition: .15s; }
        .btn-primer { background: var(--u700); color: #fff; }
        .btn-primer:hover { background: var(--u800); }
        .btn-garis { background: #fff; color: var(--u700); }
        .btn-garis:hover { background: var(--u50); }
        .btn-kecil { padding: 6px 12px; font-size: 12px; border-radius: 8px; }
        .btn-blok { width: 100%; }
        .btn[disabled] { opacity: .55; cursor: not-allowed; }
        .field { margin-bottom: 16px; }
        .field label { display: block; font-size: 13px; font-weight: 700; color: #3b3150; margin-bottom: 6px; }
        .input { width: 100%; padding: 12px 14px; border: 1.5px solid var(--garis); border-radius: 10px; font: inherit; font-size: 14px; background: #fff; color: var(--teks); }
        .input:focus { outline: none; border-color: var(--u600); box-shadow: 0 0 0 3px rgba(122,47,148,.15); }
        .input-ikon { position: relative; }
        .input-ikon .input { padding-right: 44px; }
        .input-ikon button { position: absolute; right: 8px; top: 50%; transform: translateY(-50%); background: none; border: 0; color: var(--abu); cursor: pointer; padding: 6px; }

        #toast { position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%) translateY(20px); background: #2d2438; color: #fff; padding: 12px 18px;
            border-radius: 10px; font-size: 14px; opacity: 0; pointer-events: none; transition: .25s; z-index: 200; max-width: 90vw; }
        #toast.tampil { opacity: 1; transform: translateX(-50%) translateY(0); }
    </style>
    @stack('styles')
</head>
<body>
    <div class="sim-banner">
        <span>SIMULASI LP3H &ndash; bukan sistem resmi BPJPH. Jangan memasukkan data atau kata sandi asli; semua data di sini fiktif.</span>
        <a href="{{ route('simulasi.sihalal.login') }}" id="ulangiSimulasi">Ulangi dari awal</a>
        <a href="{{ route('pelatihan_sihalal') }}" id="keluarSimulasi">Keluar dari simulasi</a>
    </div>

    @yield('body')

    <div id="toast" role="status" aria-live="polite"></div>
    <script>
        function tampilkanToast(pesan) {
            var t = document.getElementById('toast');
            t.textContent = pesan;
            t.classList.add('tampil');
            clearTimeout(window.__toast);
            window.__toast = setTimeout(function () { t.classList.remove('tampil'); }, 2600);
        }
        document.addEventListener('click', function (e) {
            var el = e.target.closest('[data-segera]');
            if (!el) return;
            e.preventDefault();
            tampilkanToast('Fitur ini belum tersedia di simulasi.');
        });
        document.addEventListener('click', function (e) {
            var tb = e.target.closest('[data-toggle-sandi]');
            if (!tb) return;
            var inp = document.getElementById(tb.getAttribute('data-toggle-sandi'));
            inp.type = inp.type === 'password' ? 'text' : 'password';
        });
    </script>
    <script>
        (function () {
            function bersihkan() {
                try {
                    ['sim_sihalal', 'sim_sihalal_nama', 'sim_sihalal_nib', 'sim_sihalal_profil'].forEach(function (k) { sessionStorage.removeItem(k); });
                } catch (e) {}
            }
            document.getElementById('keluarSimulasi').addEventListener('click', bersihkan);
            document.getElementById('ulangiSimulasi').addEventListener('click', bersihkan);
        })();
    </script>
    @stack('scripts')
</body>
</html>
