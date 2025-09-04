<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalKegiatanResource\Pages;
use App\Filament\Resources\JadwalKegiatanResource\RelationManagers;
use App\Models\JadwalKegiatan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;

class JadwalKegiatanResource extends Resource
{
    protected static ?string $model = JadwalKegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $pluralLabel = 'Jadwal Kegiatan';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kegiatan'),
                TextInput::make('tempat'),
                DatePicker::make('tanggal'),
                TimePicker::make('waktu'),
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
                    ->autocomplete('tempat')
                    ->defaultZoom(12)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kegiatan'),
                TextColumn::make('tempat'),
                TextColumn::make('tanggal')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('waktu')
                    ->time(),
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
            'index' => Pages\ListJadwalKegiatans::route('/'),
            'create' => Pages\CreateJadwalKegiatan::route('/create'),
            'edit' => Pages\EditJadwalKegiatan::route('/{record}/edit'),
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
