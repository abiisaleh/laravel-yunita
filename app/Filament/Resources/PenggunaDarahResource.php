<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenggunaDarahResource\Pages;
use App\Filament\Resources\PenggunaDarahResource\RelationManagers;
use App\Models\PenggunaDarah;
use Filament\Forms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
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

class PenggunaDarahResource extends Resource
{
    protected static ?string $model = PenggunaDarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-minus';

    protected static ?string $pluralLabel = 'Pengguna Darah';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('pengguna'),
                Select::make('darah_masuk_id')
                    ->multiple()
                    ->relationship('darah_masuk', 'no_selang', function (string $operation, Builder $query) {
                        if ($operation == 'create')
                            $query->whereDoesntHave('pengguna_darah');
                    })
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "({$record->no_selang}) {$record->pendonor->nama} - {$record->pendonor->golongan_darah->nama}/{$record->pendonor->jenis_darah->nama}")
                    ->searchable()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $jumlahKolf = collect($state)->count();
                        return $set('jumlah_kolf', $jumlahKolf);
                    })
                    ->live()
                    ->preload(),
                Select::make('rumah_sakit_id')
                    ->relationship('rumah_sakit', 'nama')
                    ->searchable()
                    ->preload(),
                Select::make('jenis_kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan'
                    ])
                    ->native(false),
                TextInput::make('jumlah_kolf')
                    ->readOnly()
                    ->numeric()
                    ->minValue(0),
                DatePicker::make('tanggal'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('tanggal')
                    ->label('Tgl penggunaan darah')
                    ->date('d/m/Y'),
                TextColumn::make('pengguna')->searchable(),
                TextColumn::make('rumah_sakit.nama')->searchable(),
                TextColumn::make('darah_masuk.no_selang')->searchable()->label('no_selang'),
                TextColumn::make('darah_masuk.pendonor.golongan_darah.nama'),
                TextColumn::make('darah_masuk.pendonor.jenis_darah.nama'),
                TextColumn::make('jumlah_kolf'),
            ])
            ->filters([
                SelectFilter::make('golongan_darah')
                    ->relationship('darah_masuk.pendonor.golongan_darah', 'nama'),
                SelectFilter::make('jenis_darah')
                    ->relationship('darah_masuk.pendonor.jenis_darah', 'nama'),
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
            'index' => Pages\ListPenggunaDarahs::route('/'),
            'create' => Pages\CreatePenggunaDarah::route('/create'),
            'edit' => Pages\EditPenggunaDarah::route('/{record}/edit'),
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
