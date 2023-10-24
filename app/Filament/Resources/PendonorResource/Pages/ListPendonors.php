<?php

namespace App\Filament\Resources\PendonorResource\Pages;

use App\Filament\Resources\PendonorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendonors extends ListRecords
{
    protected static string $resource = PendonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
