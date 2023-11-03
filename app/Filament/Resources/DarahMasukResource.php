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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class DarahMasukResource extends Resource
{
    protected static ?string $model = DarahMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-arrow-down';

    protected static ?string $pluralLabel = 'Darah Masuk';

    protected static ?int $navigationSort = 1;

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
                TextColumn::make('no_selang')
                    ->searchable(),
                TextColumn::make('pendonor.nama')
                    ->searchable(),
                TextColumn::make('pendonor.golongan_darah.nama'),
                TextColumn::make('pendonor.rh')
                    ->label('Rhesus'),
                TextColumn::make('pendonor.jenis_darah.nama'),
                TextColumn::make('tanggal')
                    ->date('d/m/Y'),
            ])
            ->filters([
                SelectFilter::make('golongan_darah')
                    ->relationship('pendonor.golongan_darah', 'nama'),
                SelectFilter::make('jenis_darah')
                    ->relationship('pendonor.jenis_darah', 'nama'),
                DateRangeFilter::make('tanggal'),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make(),
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

    public static function canCreate(): bool
    {
        if (auth()->user()->role == 'admin') {
            return true;
        }

        return false;
    }

    public static function canEdit(Model $record): bool
    {
        if (auth()->user()->role == 'admin') {
            return true;
        }

        return false;
    }

    public static function canDelete(Model $record): bool
    {
        if (auth()->user()->role == 'admin') {
            return true;
        }

        return false;
    }

    public static function canDeleteAny(): bool
    {
        if (auth()->user()->role == 'admin') {
            return true;
        }

        return false;
    }
}
