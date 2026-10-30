<footer class="bg-purple-800 text-white py-12 mt-20">
    <div class="container mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('img/Logo-Halal-Pth.png') }}" alt="HALAL Indonesia" class="h-10 w-auto brightness-0 invert">
                </div>
                <p class="text-gray-300 text-sm">
                    Lembaga Pelatihan Pendamping Proses Halal - Telkom University
                </p>
            </div>

            <div>
                <h3 class="text-white mb-4">Menu</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('index') }}" class="text-gray-300 hover:text-yellow-400 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('tentang') }}" class="text-gray-300 hover:text-yellow-400 transition-colors">Tentang</a></li>
                    <li><a href="{{ route('layanan') }}" class="text-gray-300 hover:text-yellow-400 transition-colors">Layanan</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-gray-300 hover:text-yellow-400 transition-colors">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white mb-4">Layanan</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors">Pelatihan Halal</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors">Sertifikasi</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors">Konsultasi</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition-colors">Pendampingan</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white mb-4">Kontak</h3>
                <ul class="space-y-2 text-sm">
                    <li class="text-gray-300">Telepon: 081226712870</li>
                    <li class="text-gray-300">Email: coesmartmsme@gmail.com</li>
                    <li class="text-gray-300">Alamat: Jalan Telekomunikasi</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 pt-8 text-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} LP3H Telkom University. All rights reserved.</p>
        </div>
    </div>
</footer>
