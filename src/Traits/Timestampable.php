<?php

namespace App\Traits;

trait Timestampable
{
    protected string $createdAt;

    public function initializeTimestampable(): void
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function touch(): void
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }
}
