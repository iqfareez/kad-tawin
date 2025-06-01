<?php

namespace App\Filament\Admin\Resources\UcapanResource\Pages;

use App\Filament\Admin\Resources\UcapanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUcapan extends EditRecord
{
    protected static string $resource = UcapanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
