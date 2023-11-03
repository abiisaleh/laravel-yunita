<?php

namespace App\Filament\Widgets;

use App\Models\DarahMasuk;
use App\Models\PenggunaDarah;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StokDarah extends BaseWidget
{
    protected int | string | array $columnSpan = 1;

    protected function getColumns(): int
    {
        return 1;
    }

    protected function getStats(): array
    {
        $darah_masuk = DarahMasuk::all()->count();
        $darah_keluar = PenggunaDarah::all()->sum('jumlah_kolf');

        function hitung($data)
        {
            foreach ($data as $key => $value) {
                $chart[] = $value;
            }

            $result['chart'] = $chart ?? [0];

            $perubahan = 0;

            if ($result['chart'] == [0]) {

                $result['desc'] = 'Belum ada';
                $result['icon'] = '';
                $result['color'] = '';

                return $result;
            }

            foreach ($chart as $value) {
                $perubahan = $value - $perubahan;
            }

            if ($perubahan < 0) {
                $result['desc'] = ($perubahan * -1) . ' berkurang';
                $result['icon'] = 'heroicon-m-arrow-trending-down';
                $result['color'] = 'danger';
            } elseif ($perubahan > 0) {
                $result['desc'] = $perubahan . ' bertambah';
                $result['icon'] = 'heroicon-m-arrow-trending-up';
                $result['color'] = 'success';
            } else {
                $result['desc'] = 'stabil';
                $result['icon'] = 'heroicon-m-arrow-long-right';
                $result['color'] = 'warning';
            }

            return $result;
        }

        $data_darah_masuk = hitung(DarahMasuk::all()->countBy('tanggal')->toArray());
        $data_darah_keluar = hitung(PenggunaDarah::all()->countBy('tanggal')->toArray());

        return [
            Stat::make('Darah Masuk', $darah_masuk)
                ->description($data_darah_masuk['desc'])
                ->descriptionIcon($data_darah_masuk['icon'])
                ->chart($data_darah_masuk['chart'])
                ->color($data_darah_masuk['color']),
            Stat::make('Darah Keluar', $darah_keluar)
                ->description($data_darah_keluar['desc'])
                ->descriptionIcon($data_darah_keluar['icon'])
                ->chart($data_darah_keluar['chart'])
                ->color($data_darah_keluar['color']),
        ];
    }
}
