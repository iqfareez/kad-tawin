<?php

namespace App\Filament\Admin\Resources\UcapanResource\Pages;

use App\Filament\Admin\Resources\UcapanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUcapans extends ListRecords
{
    protected static string $resource = UcapanResource::class;

    protected static ?string $title = 'Senarai Ucapan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
