
<svg class="ik" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
@switch($nama)
    @case('grid')
        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
        @break
    @case('user')
        <circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/>
        @break
    @case('home')
        <path d="M3 11l9-8 9 8"/><path d="M5 10v10h5v-6h4v6h5V10"/>
        @break
    @case('id')
        <rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16c0-2 6-2 6 0M14 10h4M14 14h4"/>
        @break
    @case('list')
        <rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 9h10M7 13h10M7 17h6"/>
        @break
    @case('invoice')
        <path d="M6 3h12v18l-3-2-3 2-3-2-3 2z"/><path d="M9 8h6M9 12h6"/>
        @break
    @case('upload')
        <path d="M12 16V4M7 9l5-5 5 5"/><path d="M4 20h16"/>
        @break
    @case('flag')
        <path d="M5 21V4h12l-2 4 2 4H5"/>
        @break
    @case('doc')
        <path d="M6 3h8l4 4v14H6z"/><path d="M14 3v4h4M9 13h6M9 17h6"/>
        @break
    @case('book')
        <path d="M3 5h7a3 3 0 013 3v12a2 2 0 00-2-2H3zM21 5h-7a3 3 0 00-3 3v12a2 2 0 012-2h8z"/>
        @break
    @case('route')
        <circle cx="6" cy="19" r="2"/><circle cx="18" cy="5" r="2"/><path d="M6 17V9a3 3 0 013-3h7M18 7v8a3 3 0 01-3 3H8"/>
        @break
    @case('lock')
        <rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 018 0v3"/>
        @break
    @case('shield')
        <path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M9 12l2 2 4-4"/>
        @break
    @case('eye')
        <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>
        @break
    @case('login')
        <path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"/><path d="M10 17l5-5-5-5M15 12H3"/>
        @break
    @case('external')
        <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><path d="M15 3h6v6M10 14L21 3"/>
        @break
    @case('download')
        <path d="M12 4v12M7 11l5 5 5-5"/><path d="M4 20h16"/>
        @break
    @case('gear')
        <circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M4.9 19.1L7 17M17 7l2.1-2.1"/>
        @break
    @case('info')
        <circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/>
        @break
@endswitch
</svg>
