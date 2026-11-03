<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Buku;
use App\Models\Anggota;
use App\Services\Peminjaman;

// 1. Inisialisasi Data Buku
$buku1 = new Buku("BK-001", "Pemrograman Berorientasi Objek PHP", "Eko Kurniawan");
$buku2 = new Buku("BK-002", "Arsitektur Perangkat Lunak Modern", "Budi Raharjo");
$buku3 = new Buku("BK-003", "Belajar Dasar Pemrograman Web", "Andi Prasetyo");

// 2. Inisialisasi Data Anggota (Sesuai 5 nama peminjam)
$anggotaList = [
    new Anggota("AGT-01", "M. Fitriannur Akbar"),
    new Anggota("AGT-02", "Okta Ramadhani"),
    new Anggota("AGT-03", "Ruli Sihab"),
    new Anggota("AGT-04", "Novy Astoty"),
    new Anggota("AGT-05", "Ega Apriliani"),
];

// 3. Simulasi Transaksi Peminjaman Buku
$peminjamanList = [
    new Peminjaman($anggotaList[0], $buku1),
    new Peminjaman($anggotaList[1], $buku2),
    new Peminjaman($anggotaList[2], $buku3),
    new Peminjaman($anggotaList[3], $buku1),
    new Peminjaman($anggotaList[4], $buku2),
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan - PBO</title>
    <!-- Tailwind CSS untuk Desain Biru Putih Modern -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50/50 font-sans antialiased text-slate-800">
    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header Profil / Kartu Identitas (Nuansa Biru Elegan) -->
            <div class="bg-blue-600 rounded-2xl shadow-lg p-6 text-white mb-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <span class="bg-blue-500 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider border border-blue-400">Lab Sheet PBO Pertemuan 7</span>
                        <h1 class="text-2xl font-bold mt-2">Sistem Informasi Perpustakaan</h1>
                        <p class="text-blue-100 text-sm mt-1">Universitas Muhammadiyah Palangkaraya</p>
                    </div>
                    <div class="mt-4 md:mt-0 text-left md:text-right bg-blue-700/60 p-3 rounded-xl border border-blue-500">
                        <p class="font-semibold text-sm">👤 Rahmansyah</p>
                        <p class="text-xs text-blue-100">NIM: 24.24.032255</p>
                        <p class="text-xs text-blue-100">Prodi: Pendidikan Teknologi Informasi</p>
                    </div>
                </div>
            </div>

            <!-- Statistik Ringkas (Putih Bersih & Aksen Biru) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-blue-100 flex items-center space-x-4">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-lg font-bold text-xl">📚</div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium uppercase">Total Buku</p>
                        <p class="text-xl font-bold text-blue-900">3 Judul</p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-blue-100 flex items-center space-x-4">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-lg font-bold text-xl">👥</div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium uppercase">Total Anggota</p>
                        <p class="text-xl font-bold text-blue-900">5 Orang</p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-blue-100 flex items-center space-x-4">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-lg font-bold text-xl">🔄</div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium uppercase">Transaksi</p>
                        <p class="text-xl font-bold text-blue-900"><?= count($peminjamanList); ?> Data</p>
                    </div>
                </div>
            </div>

            <!-- Tabel Daftar Peminjaman (Desain Rapi & Bersih) -->
            <div class="bg-white rounded-2xl shadow-sm border border-blue-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-blue-50 bg-blue-50/60 flex justify-between items-center">
                    <h2 class="font-bold text-blue-900 text-lg">Daftar Peminjaman Buku</h2>
                    <span class="text-xs text-blue-700 bg-blue-100 px-2.5 py-1 rounded-md font-medium">Live Status</span>
                </div>
                <div class="divide-y divide-slate-100">
                    <?php foreach ($peminjamanList as $index => $transaksi): ?>
                        <div class="p-5 hover:bg-blue-50/30 transition duration-150 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                            <div class="flex items-start space-x-3">
                                <span class="flex-shrink-0 w-7 h-7 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold text-xs">
                                    <?= $index + 1 ?>
                                </span>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">
                                        <?= htmlspecialchars($transaksi->getAnggota()->getNama()) ?> 
                                        <span class="text-xs font-normal text-slate-500">(<?= htmlspecialchars($transaksi->getAnggota()->getIdAnggota()) ?>)</span>
                                    </p>
                                    <p class="text-xs text-blue-600 font-medium mt-0.5">
                                        Meminjam: "<?= htmlspecialchars($transaksi->getBuku()->getJudul()) ?>"
                                    </p>
                                </div>
                            </div>
                            <div class="text-right text-xs text-slate-400 sm:block flex justify-between w-full sm:w-auto mt-2 sm:mt-0">
                                <span class="bg-blue-50 text-blue-700 px-2.5 py-1 rounded-md font-medium">Pinjam: <?= $transaksi->getTanggalPinjam() ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 text-xs text-slate-400">
                &copy; 2026 Rahmansyah - Pemrograman Berorientasi Objek | Universitas Muhammadiyah Palangkaraya
            </div>

        </div>
    </div>
</body>
</html>
