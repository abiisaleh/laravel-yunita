<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PenggunaDarah extends Model
{
    use HasFactory;

    public function darah_masuk(): BelongsToMany
    {
        return $this->belongsToMany(DarahMasuk::class);
    }

    public function rumah_sakit(): BelongsTo
    {
        return $this->BelongsTo(RumahSakit::class);
    }

    protected static function booted(): void
    {
        if (auth()->check()) {
            if (auth()->user()->role == 'pendonor') {
                static::addGlobalScope('pendonor', function (Builder $query) {
                    $query->join('darah_masuks', 'darah_masuk_id', '=', 'darah_masuks.id')->where('pendonor_id', auth()->user()->pendonor->id);
                });
            }
        };
    }
}
