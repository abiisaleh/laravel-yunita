<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesanResource\Pages;
use App\Filament\Resources\PesanResource\RelationManagers;
use App\Mail\DarahkuNoReply;
use App\Models\Pesan;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class PesanResource extends Resource
{
    protected static ?string $model = Pesan::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $pluralLabel = 'Pesan';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Placeholder::make('pengirim')
                    ->content(fn (Pesan $record): string => $record->email),
                Placeholder::make('dikirim')
                    ->content(fn (Pesan $record): string => $record->created_at->toFormattedDateString()),
                Placeholder::make('isi pesan')
                    ->content(fn (Pesan $record): string => $record->message)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('reply')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->label('Dikirim'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Dijawab'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Reply')
                    ->mutateFormDataUsing(function (array $data, Pesan $record): array {
                        $mail = [
                            'message' => $data['reply'],
                            'subject' => $record->subject,
                        ];

                        Mail::to($record->email)->send(new DarahkuNoReply($mail));
                        return $data;
                    }),
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
            'index' => Pages\ManagePesans::route('/'),
        ];
    }

    public static function canViewAny(): bool
    {
        if (in_array(auth()->user()->role, ['admin'])) {
            return true;
        }

        return false;
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
