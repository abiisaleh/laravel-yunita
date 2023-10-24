<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pekerjaan extends Model
{
    use HasFactory;

    public function pendonor(): HasMany
    {
        return $this->hasMany(Pendonor::class);
    }
}
