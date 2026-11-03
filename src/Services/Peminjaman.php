<?php

namespace App\Services;

use App\Models\Buku;
use App\Models\Anggota;

class Peminjaman
{
    private Anggota $anggota;
    private Buku $buku;
    private string $tanggalPinjam;

    public function __construct(Anggota $anggota, Buku $buku)
    {
        $this->anggota = $anggota;
        $this->buku = $buku;
        $this->tanggalPinjam = date('Y-m-d');
    }

    public function getAnggota(): Anggota
    {
        return $this->anggota;
    }

    public function getBuku(): Buku
    {
        return $this->buku;
    }

    public function getTanggalPinjam(): string
    {
        return $this->tanggalPinjam;
    }

    public function getDetailPeminjaman(): string
    {
        return "Anggota: {$this->anggota->getNama()} (ID: {$this->anggota->getIdAnggota()}) " .
               "meminjam Buku: '{$this->buku->getJudul()}' " .
               "pada tanggal {$this->tanggalPinjam} [Terdaftar Sejak: {$this->anggota->getCreatedAt()}]";
    }
}
