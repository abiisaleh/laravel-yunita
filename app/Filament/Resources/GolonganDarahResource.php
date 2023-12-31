<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GolonganDarahResource\Pages;
use App\Filament\Resources\GolonganDarahResource\RelationManagers;
use App\Models\GolonganDarah;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GolonganDarahResource extends Resource
{
    protected static ?string $model = GolonganDarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye-dropper';

    protected static ?string $pluralLabel = 'Golongan Darah';

    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->required(),
                ColorPicker::make('warna'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                ColorColumn::make('warna'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGolonganDarahs::route('/'),
        ];
    }

    public static function canViewAny(): bool
    {
        if (in_array(auth()->user()->role, ['admin'])) {
            return true;
        }

        return false;
    }
}
