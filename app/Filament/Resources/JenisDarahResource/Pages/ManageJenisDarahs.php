<?php

namespace App\Filament\Resources\JenisDarahResource\Pages;

use App\Filament\Resources\JenisDarahResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJenisDarahs extends ManageRecords
{
    protected static string $resource = JenisDarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
