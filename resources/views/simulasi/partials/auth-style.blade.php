<style>
    .auth-wrap { display: grid; grid-template-columns: minmax(340px, 1fr) minmax(0, 1.25fr); gap: 28px; padding: 24px; min-height: calc(100vh - 38px); align-items: stretch; }
    .auth-kiri { display: flex; align-items: center; justify-content: center; }
    .auth-kartu { background: #fff; border-radius: 20px; box-shadow: 0 8px 30px rgba(61,22,81,.10); padding: 32px; width: 100%; max-width: 440px; }
    .auth-kartu.lebar { box-shadow: none; background: transparent; padding: 8px 0; }
    .logo-mark { display: inline-flex; align-items: center; gap: 10px; margin-bottom: 20px; color: var(--u700); font-weight: 800; font-size: 20px; }
    .logo-mark span.kotak { width: 38px; height: 38px; border-radius: 10px; background: var(--u700); color: #fff; display: grid; place-items: center; font-size: 15px; }
    h1.judul { margin: 0 0 6px; font-size: 26px; line-height: 1.25; color: var(--u900); font-weight: 800; }
    h1.judul em { font-style: normal; color: var(--u600); }
    .sub { margin: 0 0 22px; color: var(--abu); font-size: 13px; }
    .tautan { color: var(--u700); font-weight: 700; font-size: 12px; text-decoration: none; }
    .tautan:hover { text-decoration: underline; }
    .kanan { text-align: right; margin: -8px 0 14px; }
    .captcha { display: flex; align-items: center; gap: 12px; border: 1.5px solid var(--garis); background: #fafafa; border-radius: 8px; padding: 16px 14px; width: 100%; max-width: 300px; margin-bottom: 16px; font-size: 14px; cursor: pointer; }
    .captcha input { width: 22px; height: 22px; accent-color: var(--u700); }
    .captcha small { margin-left: auto; color: var(--abu); font-size: 10px; }
    .bawah { text-align: center; font-size: 13px; color: var(--abu); margin-top: 16px; }
    .bawah a { color: var(--u900); font-weight: 700; text-decoration: none; }
    .info-peramban { margin-top: 22px; padding: 14px; background: var(--u100); border: 1px solid var(--u200); border-radius: 10px; display: flex; gap: 12px; font-size: 12px; color: #4b3a5a; }
    .info-peramban .ik { color: var(--u700); width: 22px; height: 22px; }
    .info-peramban b { display: block; color: var(--u900); font-size: 14px; margin-bottom: 2px; }
    .terhubung { display: flex; align-items: center; justify-content: space-between; margin-top: 18px; font-size: 11px; color: var(--abu); gap: 8px; }
    .pil { border: 1px solid var(--garis); border-radius: 999px; padding: 3px 10px; font-weight: 700; color: var(--u700); }
    .notif { padding: 12px 14px; border-radius: 10px; font-size: 13px; margin-bottom: 16px; }
    .notif.ok { background: var(--ok-bg); color: #14532d; }
    .panel-kanan { border-radius: 20px; background: linear-gradient(150deg, #0f766e 0%, #115e59 45%, #3d1651 100%); color: #fff; padding: 48px 40px; display: flex; flex-direction: column; justify-content: center; }
    .panel-kanan.polos { background: #ecebf0; color: var(--abu); text-align: center; align-items: center; }
    .panel-kanan h2 { margin: 0 0 18px; font-size: 28px; text-align: center; letter-spacing: .5px; }
    .kotak-pesan { background: rgba(61,22,81,.85); border-radius: 14px; padding: 24px 26px; font-size: 14px; line-height: 1.6; }
    .kotak-pesan h3 { margin: 0 0 8px; text-align: center; font-size: 16px; }
    .kotak-pesan ul { margin: 10px 0 0; padding-left: 20px; }
    .kotak-pesan li { margin-bottom: 8px; }
    .row2 { display: grid; grid-template-columns: 110px 1fr; gap: 10px; }
    @media (max-width: 860px) {
        .auth-wrap { grid-template-columns: 1fr; }
        .panel-kanan { padding: 28px 22px; }
    }
</style>
