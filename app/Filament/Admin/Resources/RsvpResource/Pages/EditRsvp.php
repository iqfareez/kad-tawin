<?php

namespace App\Filament\Admin\Resources\RsvpResource\Pages;

use App\Filament\Admin\Resources\RsvpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRsvp extends EditRecord
{
    protected static string $resource = RsvpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
