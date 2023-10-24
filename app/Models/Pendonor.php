<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendonor extends Model
{
    use HasFactory;

    public function pekerjaan(): BelongsTo
    {
        return $this->BelongsTo(Pekerjaan::class);
    }

    public function golongan_darah(): BelongsTo
    {
        return $this->BelongsTo(GolonganDarah::class);
    }

    public function jenis_darah(): BelongsTo
    {
        return $this->BelongsTo(JenisDarah::class);
    }
}
