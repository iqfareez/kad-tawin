<?php

namespace App\Filament\Admin\Resources\MajlisDetailResource\Pages;

use App\Filament\Admin\Resources\MajlisDetailResource;
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
