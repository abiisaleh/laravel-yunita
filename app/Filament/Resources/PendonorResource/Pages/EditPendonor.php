<?php

namespace App\Filament\Resources\PendonorResource\Pages;

use App\Filament\Resources\PendonorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendonor extends EditRecord
{
    protected static string $resource = PendonorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
