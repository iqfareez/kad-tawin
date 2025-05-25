<?php

namespace App\Filament\Resources\UcapanResource\Pages;

use App\Filament\Resources\UcapanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUcapans extends ListRecords
{
    protected static string $resource = UcapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
