<?php

namespace App\Filament\Admin\Resources\MajlisDetailResource\Pages;

use App\Filament\Admin\Resources\MajlisDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMajlisDetails extends ListRecords
{
    protected static string $resource = MajlisDetailResource::class;

    protected static ?string $title = 'Senarai Majlis';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
