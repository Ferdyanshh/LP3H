<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-8">
        <div class="flex items-center justify-between py-4">

            <div class="flex items-center gap-4">
                <img src="{{ asset('img/Logo-Halal.png') }}" alt="HALAL Indonesia" class="h-12 w-auto">
                <div class="border-l-2 border-gray-300 pl-4">
                    <div class="text-gray-900 font-semibold">LP3H</div>
                    <div class="text-gray-600 text-sm">Telkom University</div>
                </div>
            </div>

            <nav class="flex gap-8 items-center">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-purple-700 transition-colors">Beranda</a>

                @if (auth()->user()->isAdmin())
                    <a href="{{ route('evaluasi') }}" class="text-gray-700 hover:text-purple-700 transition-colors">Evaluasi</a>
                    <a href="{{ route('penilaian') }}" class="text-gray-700 hover:text-purple-700 transition-colors">Penilaian</a>
                    <a href="{{ route('jadwal') }}" class="text-gray-700 hover:text-purple-700 transition-colors">Jadwal</a>
                @else
                    <a href="{{ route('module') }}" class="text-gray-700 hover:text-purple-700 transition-colors">Module</a>

                    <div class="relative">
                        <button type="button" id="testButton" class="text-gray-700 hover:text-purple-700 transition-colors">
                            Test <span class="text-sm">&#9660;</span>
                        </button>
                        <div id="testDropdown" class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <a href="{{ route('pre_test') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pre-Test</a>
                            <a href="{{ route('post_test') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Post-Test</a>
                        </div>
                    </div>
                    <a href="{{ route('uji_praktik') }}" class="text-gray-700 hover:text-purple-700 transition-colors">Uji Praktik</a>
                    <a href="{{ route('kontak_us') }}" class="text-gray-700 hover:text-purple-700 transition-colors">Kontak</a>
                @endif

                <form method="POST" action="{{ route('logout_user') }}">
                    @csrf
                    <button type="submit" class="text-yellow-400 hover:text-yellow-500 transition-colors">Logout</button>
                </form>
            </nav>
        </div>
    </div>
</header>

<script>
    (function () {
        const testButton = document.getElementById('testButton');
        const testDropdown = document.getElementById('testDropdown');
        if (!testButton || !testDropdown) return;

        testButton.addEventListener('click', function (event) {
            event.stopPropagation();
            testDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (event) {
            if (!testButton.contains(event.target) && !testDropdown.contains(event.target)) {
                testDropdown.classList.add('hidden');
            }
        });
    })();
</script>
