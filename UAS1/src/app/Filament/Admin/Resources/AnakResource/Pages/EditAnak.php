<?php

namespace App\Filament\Admin\Resources\AnakResource\Pages;

use App\Filament\Admin\Resources\AnakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnak extends EditRecord
{
    protected static string $resource = AnakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
