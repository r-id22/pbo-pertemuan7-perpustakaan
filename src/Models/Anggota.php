<?php

namespace App\Models;

use App\Traits\Timestampable;

class Anggota
{
    use Timestampable;

    private string $idAnggota;
    private string $nama;

    public function __construct(string $idAnggota, string $nama)
    {
        $this->initializeTimestampable();
        $this->idAnggota = $idAnggota;
        $this->nama = $nama;
    }

    public function getIdAnggota(): string
    {
        return $this->idAnggota;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}

