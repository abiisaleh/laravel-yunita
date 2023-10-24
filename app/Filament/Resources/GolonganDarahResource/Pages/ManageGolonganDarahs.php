<?php

namespace App\Filament\Resources\GolonganDarahResource\Pages;

use App\Filament\Resources\GolonganDarahResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGolonganDarahs extends ManageRecords
{
    protected static string $resource = GolonganDarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
