<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UcapanResource\Pages;
use App\Filament\Resources\UcapanResource\RelationManagers;
use App\Models\Ucapan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UcapanResource extends Resource
{
    protected static ?string $model = Ucapan::class;

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
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ucapan')
                    ->label('Ucapan')
                    ->columnSpanFull(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y h:i A')
                    ->sortable()
                    ->wrap()
                    ->weight(fn($record) => $record->created_at->isToday() ? FontWeight::Bold : null),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('from_form')
                    ->label('Majlis')
                    ->options([
                        'najwa-fareez' => 'Kenduri Kedah',
                        'fareez-najwa' => 'Kenduri KL',
                    ]),
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
            'index' => Pages\ListUcapans::route('/'),
            'create' => Pages\CreateUcapan::route('/create'),
            'edit' => Pages\EditUcapan::route('/{record}/edit'),
        ];
    }
}
