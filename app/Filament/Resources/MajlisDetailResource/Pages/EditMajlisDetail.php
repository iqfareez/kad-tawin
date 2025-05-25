<?php

namespace App\Filament\Resources\MajlisDetailResource\Pages;

use App\Filament\Resources\MajlisDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMajlisDetail extends EditRecord
{
    protected static string $resource = MajlisDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
