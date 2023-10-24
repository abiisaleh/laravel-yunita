<?php

namespace App\Filament\Resources\PenggunaDarahResource\Pages;

use App\Filament\Resources\PenggunaDarahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenggunaDarahs extends ListRecords
{
    protected static string $resource = PenggunaDarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
