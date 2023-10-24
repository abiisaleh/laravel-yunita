<?php

namespace App\Filament\Widgets;

use App\Models\DarahMasuk;
use Filament\Support\Colors\Color;
use Filament\Widgets\ChartWidget;

class StokDarahChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Stok Darah';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Rh +',
                    'data' => [0, 10, 5, 29],
                ],
                [
                    'label' => 'Rh -',
                    'data' => [1, 6, 2, 12],
                    'backgroundColor' => '#fdae4b50',
                    'borderColor' => '#fdae4b',
                ],
            ],
            'labels' => ['A', 'B', 'AB', 'O'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
