<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DarahMasukResource\Pages;
use App\Filament\Resources\DarahMasukResource\RelationManagers;
use App\Models\DarahMasuk;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DarahMasukResource extends Resource
{
    protected static ?string $model = DarahMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-arrow-down';

    protected static ?string $pluralLabel = 'Darah Masuk';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no_selang'),
                Select::make('pendonor_id')
                    ->relationship('pendonor', 'nama')
                    ->searchable()
                    ->preload(),
                DatePicker::make('tanggal')
                    ->displayFormat('d/m/Y'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_selang'),
                TextColumn::make('pendonor.nama'),
                TextColumn::make('pendonor.golongan_darah.nama'),
                TextColumn::make('pendonor.jenis_darah.nama'),
                TextColumn::make('tanggal')
                    ->date('d/m/Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDarahMasuks::route('/'),
            'create' => Pages\CreateDarahMasuk::route('/create'),
            'edit' => Pages\EditDarahMasuk::route('/{record}/edit'),
        ];
    }
}
