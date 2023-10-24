<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pendonor extends Model
{
    use HasFactory;

    // protected $fillable = ['nama', 'jenis_kelamin', 'pekerjaan_id', 'golongan_darah_id', 'jenis_darah_id', 'user_id', 'alamat'];

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
