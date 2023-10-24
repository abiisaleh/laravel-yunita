<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendonorResource\Pages;
use App\Filament\Resources\PendonorResource\RelationManagers;
use App\Models\Pendonor;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendonorResource extends Resource
{
    protected static ?string $model = Pendonor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $pluralLabel = 'Pendonor';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                Select::make('jenis_kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan'
                    ])
                    ->native(false),
                Select::make('pekerjaan_id')
                    ->relationship(name: 'pekerjaan', titleAttribute: 'nama')
                    ->native(false),
                Select::make('golongan_darah_id')
                    ->relationship(name: 'golongan_darah', titleAttribute: 'nama')
                    ->native(false),
                Select::make('jenis_darah_id')
                    ->relationship(name: 'jenis_darah', titleAttribute: 'nama')
                    ->native(false),
                Textarea::make('alamat'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nama'),
                TextColumn::make('jenis_kelamin'),
                TextColumn::make('golongan_darah.nama'),
                TextColumn::make('jenis_darah.nama'),
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
            'index' => Pages\ListPendonors::route('/'),
            'create' => Pages\CreatePendonor::route('/create'),
            'edit' => Pages\EditPendonor::route('/{record}/edit'),
        ];
    }
}
