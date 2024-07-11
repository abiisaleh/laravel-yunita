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
        $golDarah = \App\Models\GolonganDarah::all()->pluck('nama')->toArray();

        foreach ($jenisDarah as $record) {
            $darahMasuk = DB::table('darah_masuks')

                ->join('pendonors', 'darah_masuks.pendonor_id', '=', 'pendonors.id')
                ->join('golongan_darahs', 'pendonors.golongan_darah_id', '=', 'golongan_darahs.id')
                ->join('jenis_darahs', 'pendonors.jenis_darah_id', '=', 'jenis_darahs.id')
                ->groupBy('golongan_darahs.nama', 'jenis_darahs.nama')
                ->select('golongan_darahs.nama as golongan_darah', 'jenis_darahs.nama as jenis_darah', DB::raw('COUNT(darah_masuks.id) as jumlah'))
                ->where('jenis_darahs.nama', '=', $record['nama'])
                ->pluck('jumlah', 'golongan_darah')
                ->toArray();

            $darahKeluar = DB::table('pengguna_darahs')
                ->join('darah_masuk_pengguna_darah', 'pengguna_darahs.id', '=', 'darah_masuk_pengguna_darah.pengguna_darah_id')
                ->join('darah_masuks', 'darah_masuk_pengguna_darah.darah_masuk_id', '=', 'darah_masuks.id')
                ->join('pendonors', 'darah_masuks.pendonor_id', '=', 'pendonors.id')
                ->join('golongan_darahs', 'pendonors.golongan_darah_id', '=', 'golongan_darahs.id')
                ->join('jenis_darahs', 'pendonors.jenis_darah_id', '=', 'jenis_darahs.id')
                ->groupBy('golongan_darahs.nama', 'jenis_darahs.nama')
                ->select('golongan_darahs.nama as golongan_darah', 'jenis_darahs.nama as jenis_darah', DB::raw('COUNT(darah_masuks.id) as jumlah'))
                ->where('jenis_darahs.nama', '=', $record['nama'])
                ->pluck('jumlah', 'golongan_darah')
                ->toArray();

            $result = [];

            //menghitung stok darah dari darah masuk - darah keluar
            foreach ($darahMasuk as $key => $value) {
                if (array_key_exists($key, $darahKeluar)) {
                    $result[$key] = $value - $darahKeluar[$key];
                } else {
                    $result[$key] = $value;
                }
            }

            foreach ($darahKeluar as $key => $value) {
                if (!array_key_exists($key, $darahMasuk)) {
                    $result[$key] = -$value;
                }
            }

            $data = [];

            foreach ($golDarah as $value) {
                $data[] = $result[$value] ?? 0;
            }

            $dataset[] = [
                'label' => $record['nama'],
                'data' => $data,
                'backgroundColor' => $record['warna'] . '50',
                'borderColor' => $record['warna'],
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
