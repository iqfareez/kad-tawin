<?php

namespace App\Filament\Admin\Resources\RsvpResource\Pages;

use App\Filament\Admin\Resources\RsvpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRsvps extends ListRecords
{
    protected static string $resource = RsvpResource::class;

    protected static ?string $title = 'Senarai RSVP';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
