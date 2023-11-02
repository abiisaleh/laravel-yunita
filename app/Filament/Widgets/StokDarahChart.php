<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class StokDarahChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Stok Darah';

    protected function getData(): array
    {
        $jenisDarah = \App\Models\JenisDarah::all()->toArray();

        foreach ($jenisDarah as $value) {
            $data = DB::table('darah_masuks')
                ->join('pendonors', 'darah_masuks.pendonor_id', '=', 'pendonors.id')
                ->join('golongan_darahs', 'pendonors.golongan_darah_id', '=', 'golongan_darahs.id')
                ->join('jenis_darahs', 'pendonors.jenis_darah_id', '=', 'jenis_darahs.id')
                ->groupBy('golongan_darahs.nama', 'jenis_darahs.nama')
                ->select('golongan_darahs.nama as golongan_darah', 'jenis_darahs.nama as jenis_darah', DB::raw('COUNT(darah_masuks.id) as jumlah'))
                ->where('jenis_darahs.nama', '=', $value['nama'])
                ->pluck('jumlah')
                ->toArray();

            $dataset[] = [
                'label' => $value['nama'],
                'data' => $data,
                'backgroundColor' => $value['warna'] . '50',
                'borderColor' => $value['warna'],
            ];
        }

        return [
            'datasets' => $dataset,
            'labels' => \App\Models\GolonganDarah::all()->pluck('nama'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
