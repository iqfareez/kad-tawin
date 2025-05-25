<?php

namespace App\Filament\Resources\MajlisDetailResource\Pages;

use App\Filament\Resources\MajlisDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMajlisDetails extends ListRecords
{
    protected static string $resource = MajlisDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
