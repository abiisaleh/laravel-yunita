<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenggunaDarah extends Model
{
    use HasFactory;

    public function darah_masuk(): BelongsTo
    {
        return $this->BelongsTo(DarahMasuk::class);
    }

    public function rumah_sakit(): BelongsTo
    {
        return $this->BelongsTo(RumahSakit::class);
    }
}
