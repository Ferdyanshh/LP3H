<style>
    .ob-wrap { min-height: calc(100vh - 38px); display: flex; flex-direction: column; align-items: center; padding: 36px 16px 56px; }
    .ob-logo { display: flex; align-items: center; gap: 10px; color: var(--u700); font-weight: 800; font-size: 22px; margin-bottom: 22px; }
    .ob-logo .kotak { width: 40px; height: 40px; border-radius: 10px; background: var(--u700); color: #fff; display: grid; place-items: center; font-size: 15px; }
    .ob-kartu { background: #fff; border-radius: 16px; box-shadow: 0 8px 30px rgba(61,22,81,.10); padding: 28px 32px; width: 100%; max-width: 640px; }
    .ob-kartu.sempit { max-width: 400px; }
    .ob-kartu.lebar { max-width: 780px; }
    .ob-kepala { display: flex; justify-content: space-between; align-items: flex-start; gap: 12px; margin-bottom: 22px; }
    .ob-judul { font-size: 18px; font-weight: 800; margin: 0 0 4px; color: var(--teks); }
    .ob-sub { font-size: 12px; color: var(--abu); margin: 0; }
    .langkah-badge { background: var(--u100); color: var(--u700); font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 999px; white-space: nowrap; }
    .opsi { display: flex; justify-content: space-between; align-items: center; border: 1.5px solid var(--garis); border-radius: 10px; padding: 14px 16px; margin-bottom: 10px; cursor: pointer; font-size: 14px; }
    .opsi:has(input:checked) { border-color: var(--u700); background: var(--u50); }
    .opsi input { width: 18px; height: 18px; accent-color: var(--u700); }
    .dua-btn { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 16px; }
    .info-box { display: flex; gap: 10px; align-items: flex-start; background: var(--u100); color: #4b3a5a; border-radius: 8px; padding: 12px 14px; font-size: 13px; margin: 14px 0 4px; }
    .info-box .ik { color: var(--u700); width: 20px; height: 20px; margin-top: 1px; }
    .info-box.kuning { background: #fef3c7; color: #78350f; }
    .info-box.kuning .ik { color: #b45309; }
    .galat { color: #b91c1c; font-size: 13px; margin: 8px 0 0; display: none; }
    .data-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px 36px; margin: 8px 0 26px; }
    .data-grid small { display: block; font-size: 12px; color: var(--abu); margin-bottom: 2px; }
    .data-grid b { font-size: 14px; word-break: break-word; }
    .merah { color: #ef4444; font-weight: 700; font-size: 14px; }
    .hijau-teks { color: #16a34a; font-weight: 700; font-size: 14px; }
    .tbl-kepala { display: flex; justify-content: space-between; align-items: center; margin: 6px 0 12px; font-weight: 700; font-size: 14px; }
    .tbl-wrap { overflow-x: auto; }
    table.tbl { width: 100%; border-collapse: collapse; font-size: 12px; }
    table.tbl th { background: #f3f2f6; text-align: left; padding: 12px 10px; color: var(--abu); text-transform: uppercase; font-size: 11px; letter-spacing: .5px; }
    table.tbl td { padding: 12px 10px; border-bottom: 1px solid var(--garis); }
    .tbl-kaki { text-align: right; font-size: 12px; color: var(--abu); padding: 10px 4px 0; }
    .contoh-box { margin-top: 22px; width: 100%; max-width: 640px; border: 2px dashed var(--u200); border-radius: 14px; padding: 18px 20px; background: rgba(255,255,255,.6); }
    .contoh-box h2 { margin: 0 0 4px; font-size: 14px; color: var(--u800); }
    .contoh-box p { margin: 0 0 12px; font-size: 12px; color: var(--abu); }
    .contoh { display: block; width: 100%; text-align: left; background: #fff; border: 1.5px solid var(--garis); border-radius: 10px; padding: 10px 12px; margin-bottom: 8px; font: inherit; cursor: pointer; }
    .contoh:hover { border-color: var(--u600); background: var(--u50); }
    .contoh b { font-size: 14px; letter-spacing: 1px; color: var(--u700); }
    .contoh span { display: block; font-size: 12px; color: var(--abu); margin-top: 2px; }
    @media (max-width: 640px) { .data-grid { grid-template-columns: 1fr; } .ob-kartu { padding: 22px 18px; } }
</style>
