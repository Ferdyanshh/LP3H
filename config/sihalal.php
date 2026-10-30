<?php

return [
    'pengguna' => [
        'tipe' => 'Pelaku Usaha',
        'status' => 'Akun Aktif',
    ],

    'tipe_pengguna' => ['Pelaku Usaha', 'Pendamping PPH', 'Importir'],

    'menu' => [
        [
            'judul' => 'Kalkulator',
            'item' => [
                ['label' => 'Kalkulator Simulasi Perhitungan Biaya Audit', 'ikon' => 'grid', 'route' => null],
            ],
        ],
        [
            'judul' => 'Menu Utama',
            'item' => [
                ['label' => 'Pelaku Usaha', 'ikon' => 'user', 'route' => null],
                ['label' => 'Dashboard', 'ikon' => 'home', 'route' => 'simulasi.sihalal.dashboard'],
            ],
        ],
        [
            'judul' => 'Sertifikasi Halal',
            'item' => [
                ['label' => 'Pengajuan Reguler', 'ikon' => 'id', 'route' => null],
                ['label' => 'Pengajuan Self Declare', 'ikon' => 'id', 'route' => null],
                ['label' => 'Pengajuan Self Declare (Halalmax)', 'ikon' => 'id', 'route' => null],
                ['label' => 'Pengajuan Self Declare Mandiri', 'ikon' => 'id', 'route' => null],
                ['label' => 'Status Permohonan', 'ikon' => 'list', 'route' => null],
                ['label' => 'Tagihan / Invoice', 'ikon' => 'invoice', 'route' => null],
            ],
        ],
        [
            'judul' => 'Registrasi SHLN',
            'item' => [
                ['label' => 'Submissions', 'ikon' => 'upload', 'route' => null],
                ['label' => 'Pelaporan', 'ikon' => 'flag', 'route' => null],
                ['label' => 'Invoice', 'ikon' => 'doc', 'route' => null],
            ],
        ],
    ],

    'langkah_cepat' => [
        ['judul' => 'Lengkapi Profil Usaha', 'isi' => 'Pastikan data legalitas dan kontak selalu terbaru.'],
        ['judul' => 'Siapkan Dokumen', 'isi' => 'Cek daftar dokumen wajib sebelum mengajukan.'],
        ['judul' => 'Pantau Status', 'isi' => 'Respon cepat jika ada catatan perbaikan.'],
    ],

    'dokumen_publik' => [
        ['judul' => 'Survei Kepuasan Masyarakat (SKM)', 'isi' => 'Lihat atau unduh dokumen contoh Survei Kepuasan Masyarakat.'],
        ['judul' => 'Standar Pelayanan', 'isi' => 'Lihat atau unduh dokumen contoh Standar Pelayanan.'],
    ],

    'keamanan' => [
        ['judul' => 'Perbarui kata sandi', 'isi' => 'Disarankan memperbarui kata sandi secara berkala.', 'badge' => 'OK', 'ikon' => 'lock', 'aksi' => 'Perbarui'],
        ['judul' => 'Verifikasi 2 Langkah', 'isi' => 'Akun terlindungi verifikasi dua langkah.', 'badge' => 'Aktif', 'ikon' => 'shield', 'aksi' => 'Kelola 2FA'],
    ],

    'survei' => [
        'judul' => 'Survei Kepuasan Masyarakat per Layanan',
        'daftar' => [
            'Penerbitan Kode Fasilitasi Sertifikasi Halal Pernyataan Pelaku Usaha Mikro dan Kecil',
            'Penerbitan Kode Fasilitasi Sertifikasi Halal Reguler',
            'Penerbitan Sertifikat Halal Pernyataan Pelaku Usaha Mikro dan Kecil',
            'Penerbitan Sertifikat Halal Reguler',
        ],
        'kartu' => [
            ['judul' => 'Sensus Ekonomi', 'isi' => 'Contoh kartu informasi. Pada simulasi ini tidak ada tautan ke situs luar.', 'tombol' => 'Kunjungi Sensus'],
            ['judul' => 'Survei Kepuasan Masyarakat', 'isi' => 'Contoh kartu survei. Pada simulasi ini tidak ada tautan ke situs luar.', 'tombol' => 'Isi Survei'],
        ],
    ],

    'nib_contoh' => [
        [
            'nib' => '1001000000001',
            'nama_perusahaan' => 'WARUNG MAKAN BU SARI (CONTOH)',
            'alamat' => 'Jl. Contoh Raya No. 1, Kota Bandung, Jawa Barat',
            'npwp' => '00.000.001.0-000.000',
            'kategori' => 'UMK',
            'skala' => 'Usaha Mikro',
            'modal_dasar' => 25000000,
            'status' => 'tersedia',
            'didaftarkan_oleh' => null,
            'skenario' => 'UMK (mikro): lanjut normal, cocok untuk Self Declare',
            'kegiatan' => [
                ['kbli' => '56101', 'nama' => 'Restoran dan Rumah Makan', 'alamat' => 'Jl. Contoh Raya No. 1, Bandung', 'modal' => 25000000],
            ],
        ],
        [
            'nib' => '1001000000002',
            'nama_perusahaan' => 'DAPUR KUE NUSANTARA (CONTOH)',
            'alamat' => 'Jl. Latihan Indah No. 22, Kota Bandung, Jawa Barat',
            'npwp' => '00.000.002.0-000.000',
            'kategori' => 'UMK',
            'skala' => 'Usaha Kecil',
            'modal_dasar' => 450000000,
            'status' => 'tersedia',
            'didaftarkan_oleh' => null,
            'skenario' => 'UMK (kecil): lanjut normal, cocok untuk Self Declare',
            'kegiatan' => [
                ['kbli' => '10710', 'nama' => 'Industri Roti dan Kue', 'alamat' => 'Jl. Latihan Indah No. 22, Bandung', 'modal' => 450000000],
            ],
        ],
        [
            'nib' => '1001000000003',
            'nama_perusahaan' => 'PT PANGAN SEJAHTERA CONTOH',
            'alamat' => 'Kawasan Industri Contoh Blok C-3, Kab. Bekasi, Jawa Barat',
            'npwp' => '00.000.003.0-000.000',
            'kategori' => 'Non UMK',
            'skala' => 'Usaha Besar',
            'modal_dasar' => 55000000000,
            'status' => 'tersedia',
            'didaftarkan_oleh' => null,
            'skenario' => 'Non UMK: tidak bisa Self Declare, harus jalur Reguler',
            'kegiatan' => [
                ['kbli' => '10710', 'nama' => 'Industri Roti dan Kue', 'alamat' => 'Kawasan Industri Contoh Blok C-3, Bekasi', 'modal' => 55000000000],
            ],
        ],
        [
            'nib' => '1001000000004',
            'nama_perusahaan' => 'RUMAH MAKAN PADANG CONTOH',
            'alamat' => 'Jl. Simulasi No. 8, Kota Padang, Sumatera Barat',
            'npwp' => '00.000.004.0-000.000',
            'kategori' => 'UMK',
            'skala' => 'Usaha Mikro',
            'modal_dasar' => 60000000,
            'status' => 'terdaftar',
            'didaftarkan_oleh' => 'pengguna.lain@contoh.test',
            'skenario' => 'Sudah didaftarkan pengguna lain: tidak bisa dilanjutkan',
            'kegiatan' => [
                ['kbli' => '56101', 'nama' => 'Restoran dan Rumah Makan', 'alamat' => 'Jl. Simulasi No. 8, Padang', 'modal' => 60000000],
            ],
        ],
    ],
];
