<?php

namespace App\Models;

use App\Traits\Timestampable;

class Buku
{
    use Timestampable;

    private string $kodeBuku;
    private string $judul;
    private string $penulis;

    public function __construct(string $kodeBuku, string $judul, string $penulis)
    {
        $this->initializeTimestampable();
        $this->kodeBuku = $kodeBuku;
        $this->judul = $judul;
        $this->penulis = $penulis;
    }

    public function getKodeBuku(): string
    {
        return $this->kodeBuku;
    }

    public function getJudul(): string
    {
        return $this->judul;
    }

    public function getPenulis(): string
    {
        return $this->penulis;
    }
}
