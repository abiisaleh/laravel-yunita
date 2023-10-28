<?php

namespace App\Filament\Widgets;

use App\Models\DarahMasuk;
use App\Models\PenggunaDarah;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StokDarah extends BaseWidget
{
    protected function getStats(): array
    {
        $darah_masuk = DarahMasuk::all()->count();
        $darah_keluar = PenggunaDarah::all()->sum('jumlah_kolf');
        $stok_darah = $darah_masuk - $darah_keluar;

        return [
            Stat::make('Stok Darah', $stok_darah),
            Stat::make('Darah Masuk', $darah_masuk),
            Stat::make('Darah Keluar', $darah_keluar),
        ];
    }
}
