<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendonorResource\Pages;
use App\Filament\Resources\PendonorResource\RelationManagers;
use App\Models\Pendonor;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PendonorResource extends Resource
{
    protected static ?string $model = Pendonor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $pluralLabel = 'Pendonor';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                TextInput::make('email')
                    ->hiddenOn('edit'),
                DatePicker::make('tanggal_lahir'),
                Select::make('jenis_kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan'
                    ])
                    ->native(false),
                Select::make('pekerjaan_id')
                    ->relationship(name: 'pekerjaan', titleAttribute: 'nama')
                    ->native(false),
                Fieldset::make()
                    ->schema([
                        Select::make('golongan_darah_id')
                            ->relationship(name: 'golongan_darah', titleAttribute: 'nama')
                            ->native(false)
                            ->columns(1),
                        Select::make('rh')
                            ->label('Rheus')
                            ->options([
                                'positive' => 'Positive',
                                'negative' => 'Negative'
                            ])
                            ->native(false),
                        Select::make('jenis_darah_id')
                            ->relationship(name: 'jenis_darah', titleAttribute: 'nama')
                            ->native(false),
                    ])
                    ->columns(3),
                Fieldset::make()
                    ->schema([
                        TextInput::make('alamat')
                            ->columnSpanFull(),
                        Map::make('location')
                            ->mapControls([
                                'mapTypeControl'    => true,
                                'scaleControl'      => true,
                                'streetViewControl' => false,
                                'rotateControl'     => false,
                                'fullscreenControl' => true,
                                'searchBoxControl'  => false, // creates geocomplete field inside map
                                'zoomControl'       => true,
                            ])
                            ->clickable()
                            ->defaultLocation([-2.5651354, 140.5986246])
                            ->autocomplete('alamat')
                            ->defaultZoom(12)
                            ->columnSpanFull(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('jenis_kelamin'),
                TextColumn::make('golongan_darah.nama'),
                TextColumn::make('jenis_darah.nama'),
            ])
            ->filters([
                SelectFilter::make('golongan_darah.nama')
                    ->label('Golongan Darah'),
                SelectFilter::make('jenis_darah.nama')
                    ->label('Jenis Darah'),
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
            'index' => Pages\ListPendonors::route('/'),
            'create' => Pages\CreatePendonor::route('/create'),
            'edit' => Pages\EditPendonor::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        if (in_array(auth()->user()->role, ['admin', 'super'])) {
            return true;
        }

        return false;
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
