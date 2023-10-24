<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DarahMasuk extends Model
{
    use HasFactory;

    public function pendonor(): BelongsTo
    {
        return $this->BelongsTo(Pendonor::class);
    }

    protected static function booted(): void
    {
        if (auth()->user()->role == 'pendonor') {
            static::addGlobalScope('pendonor', function (Builder $query) {
                $query->where('pendonor_id', auth()->user()->pendonor->id);
            });
        }
    }
}
