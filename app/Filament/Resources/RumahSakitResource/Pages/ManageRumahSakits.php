<?php

namespace App\Filament\Resources\RumahSakitResource\Pages;

use App\Filament\Resources\RumahSakitResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRumahSakits extends ManageRecords
{
    protected static string $resource = RumahSakitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
