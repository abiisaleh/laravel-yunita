<?php

namespace App\Filament\Resources\DarahMasukResource\Pages;

use App\Filament\Resources\DarahMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDarahMasuk extends EditRecord
{
    protected static string $resource = DarahMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
