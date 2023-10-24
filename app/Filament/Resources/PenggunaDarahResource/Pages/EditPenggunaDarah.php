<?php

namespace App\Filament\Resources\PenggunaDarahResource\Pages;

use App\Filament\Resources\PenggunaDarahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenggunaDarah extends EditRecord
{
    protected static string $resource = PenggunaDarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
