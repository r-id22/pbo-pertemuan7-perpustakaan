<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Buku;
use App\Models\Anggota;
use App\Services\Peminjaman;

echo "==================================================\n";
echo " TUGAS PBO PERTEMUAN 7 - PROYEK PERPUSTAKAAN\n";
echo " Nama  : Rahmansyah\n";
echo " NIM   : 24.24.032255\n";
echo " Prodi : Pendidikan Teknologi Informasi (UMPR)\n";
echo "==================================================\n\n";

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
echo "--- DAFTAR PEMINJAMAN BUKU PERPUSTAKAAN ---\n";
$peminjaman = [
    new Peminjaman($anggotaList[0], $buku1),
    new Peminjaman($anggotaList[1], $buku2),
    new Peminjaman($anggotaList[2], $buku3),
    new Peminjaman($anggotaList[3], $buku1),
    new Peminjaman($anggotaList[4], $buku2),
];

foreach ($peminjaman as $index => $transaksi) {
    echo ($index + 1) . ". " . $transaksi->getDetailPeminjaman() . "\n";
}
echo "\n==================================================\n";
