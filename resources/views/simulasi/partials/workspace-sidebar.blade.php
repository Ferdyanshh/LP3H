<aside class="workspace-sidebar" id="workspaceSidebar">
    <div class="workspace-logo"><span>SH</span> SiHalal</div>

    @foreach (config('sihalal.menu') as $grup)
        <div class="workspace-menu-title">{{ $grup['judul'] }}</div>
        @foreach ($grup['item'] as $item)
            <a href="{{ route($item['route']) }}" class="workspace-menu-item {{ request()->routeIs($item['route']) ? 'active' : '' }}">
                @include('simulasi.partials.ikon', ['nama' => $item['ikon']]) {{ $item['label'] }}
            </a>
        @endforeach
    @endforeach
</aside>
