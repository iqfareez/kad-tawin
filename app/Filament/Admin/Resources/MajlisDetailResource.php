<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MajlisDetailResource\Pages;
use App\Filament\Admin\Resources\MajlisDetailResource\RelationManagers;
use App\Models\MajlisDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MajlisDetailResource extends Resource
{
    protected static ?string $model = MajlisDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('pengantin_lelaki_first')
                    ->label('Side')
                    ->formatStateUsing(fn($state) => $state ? 'Belah Lelaki' : 'Belah Perempuan'),
                Tables\Columns\TextColumn::make('majlis_date')
                    ->label('Tarikh Majlis')
                    ->dateTime('d/m/Y'),
                Tables\Columns\TextColumn::make('venue_address_line_1')
                    ->label('Lokasi Majlis'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y h:i A')
                    ->wrap()
                    ->weight(fn($record) => $record->updated_at->isToday() ? FontWeight::Bold : null),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('view-kad')
                    ->label('Lihat Kad')
                    ->url(fn(MajlisDetail $record) => route('kenduri.show', ['slug' => $record->slug]))
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListMajlisDetails::route('/'),
            'create' => Pages\CreateMajlisDetail::route('/create'),
            'edit' => Pages\EditMajlisDetail::route('/{record}/edit'),
        ];
    }
}
