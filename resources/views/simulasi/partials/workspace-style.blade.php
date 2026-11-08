<style>
    .workspace-layout { display: flex; min-height: calc(100vh - 38px); }
    .workspace-sidebar { width: 276px; flex: none; padding: 22px 14px; color: #f5ecfa; background: linear-gradient(180deg, var(--u800), var(--u900)); position: sticky; top: 38px; align-self: flex-start; height: calc(100vh - 38px); overflow-y: auto; }
    .workspace-logo { display: flex; align-items: center; gap: 10px; padding: 0 10px 20px; color: #fff; font-size: 22px; font-weight: 800; }
    .workspace-logo span { width: 36px; height: 36px; display: grid; place-items: center; border-radius: 10px; background: rgba(255,255,255,.14); font-size: 14px; }
    .workspace-menu-title { padding: 18px 12px 8px; color: #bca5c7; font-size: 11px; font-weight: 700; letter-spacing: 1.4px; text-transform: uppercase; }
    .workspace-menu-item { display: flex; align-items: center; gap: 12px; padding: 11px 12px; border-radius: 10px; color: #f5ecfa; text-decoration: none; font-size: 14px; font-weight: 600; line-height: 1.35; }
    .workspace-menu-item:hover, .workspace-menu-item.active { background: var(--u700); color: #fff; }
    .workspace-menu-item .ik { width: 20px; height: 20px; }
    .workspace-main { flex: 1; min-width: 0; padding: 20px 28px 44px; }
    .workspace-topbar { max-width: 1240px; margin: 0 auto 22px; padding: 12px 18px; display: flex; align-items: center; justify-content: flex-end; gap: 16px; border: 1px solid rgba(75,29,94,.06); border-radius: 14px; background: #fff; box-shadow: 0 2px 12px rgba(61,22,81,.06); }
    .workspace-menu-button { display: none; margin-right: auto; padding: 6px 10px; border: 1.5px solid var(--garis); border-radius: 8px; background: #fff; font-size: 18px; cursor: pointer; }
    .workspace-documentation { display: inline-flex; align-items: center; gap: 6px; color: var(--u700); font-size: 12px; font-weight: 700; letter-spacing: 1px; text-decoration: none; }
    .workspace-language { padding: 6px 12px; border: 1.5px solid #2d2438; border-radius: 8px; background: #fff; font-size: 13px; font-weight: 600; }
    .workspace-avatar { width: 42px; height: 42px; display: grid; place-items: center; border-radius: 50%; background: #e4e1ea; color: #8d8699; position: relative; }
    .workspace-avatar::after { content: ''; width: 10px; height: 10px; position: absolute; right: 1px; bottom: 1px; border: 2px solid #fff; border-radius: 50%; background: #22c55e; }
    .workspace-avatar .ik { width: 24px; height: 24px; }
    .workspace-page { max-width: 1240px; margin: 0 auto; }
    .workspace-heading { display: flex; align-items: flex-start; justify-content: space-between; gap: 20px; margin-bottom: 22px; }
    .workspace-heading h1 { margin: 5px 0 7px; color: var(--teks); font-size: 30px; line-height: 1.2; }
    .workspace-heading p { margin: 0; color: var(--abu); font-size: 14px; line-height: 1.6; }
    .workspace-eyebrow { color: var(--u700); font-size: 12px; font-weight: 800; letter-spacing: 1.2px; text-transform: uppercase; }
    .workspace-card { border: 1px solid #ece8f0; border-radius: 14px; background: #fff; box-shadow: 0 4px 18px rgba(61,22,81,.07); }
    .workspace-card-head { padding: 15px 20px; display: flex; align-items: center; justify-content: space-between; gap: 14px; border-bottom: 1px solid var(--garis); }
    .workspace-card-head h2 { margin: 0; font-size: 17px; }
    .workspace-card-body { padding: 20px; }
    .workspace-alert { margin-bottom: 18px; padding: 13px 15px; border: 1px solid #f6d98c; border-radius: 10px; background: #fff7dd; color: #72500d; font-size: 13px; line-height: 1.55; }
    .workspace-alert.danger { border-color: #fecaca; background: #fff1f2; color: #991b1b; }
    .workspace-alert.success { border-color: #bbf7d0; background: #f0fdf4; color: #166534; }
    .workspace-badge { display: inline-flex; align-items: center; gap: 6px; padding: 5px 10px; border-radius: 999px; background: var(--u100); color: var(--u700); font-size: 12px; font-weight: 700; }
    .workspace-badge.success { background: var(--ok-bg); color: var(--ok); }
    .workspace-badge.warning { background: #fef3c7; color: #92400e; }
    .workspace-empty { padding: 58px 24px; text-align: center; }
    .workspace-empty-icon { width: 72px; height: 72px; margin: 0 auto 18px; display: grid; place-items: center; border-radius: 22px; background: var(--u100); color: var(--u700); }
    .workspace-empty-icon .ik { width: 34px; height: 34px; }
    .workspace-empty h2 { margin: 0 0 8px; font-size: 22px; }
    .workspace-empty p { max-width: 540px; margin: 0 auto 22px; color: var(--abu); font-size: 14px; line-height: 1.65; }
    .workspace-table-wrap { overflow-x: auto; }
    .workspace-table { width: 100%; border-collapse: collapse; font-size: 13px; }
    .workspace-table th { padding: 11px 12px; background: var(--u50); color: #50435b; text-align: left; font-size: 11px; letter-spacing: .6px; text-transform: uppercase; }
    .workspace-table td { padding: 12px; border-top: 1px solid var(--garis); vertical-align: top; }
    .workspace-table-empty { color: var(--abu); text-align: center; }
    .workspace-icon-button { width: 32px; height: 32px; display: inline-grid; place-items: center; border: 1px solid #f0c5c5; border-radius: 8px; background: #fff5f5; color: #b91c1c; cursor: pointer; }
    .workspace-icon-button .ik { width: 16px; height: 16px; }
    @media (max-width: 900px) {
        .workspace-sidebar { position: fixed; left: 0; top: 38px; z-index: 90; transform: translateX(-100%); transition: transform .25s; }
        .workspace-sidebar.open { transform: translateX(0); }
        .workspace-main { padding: 16px; }
        .workspace-menu-button { display: block; }
        .workspace-heading { flex-direction: column; }
    }
</style>
