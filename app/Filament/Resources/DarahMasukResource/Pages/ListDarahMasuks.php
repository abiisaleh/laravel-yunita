<?php

namespace App\Filament\Resources\DarahMasukResource\Pages;

use App\Filament\Resources\DarahMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDarahMasuks extends ListRecords
{
    protected static string $resource = DarahMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
