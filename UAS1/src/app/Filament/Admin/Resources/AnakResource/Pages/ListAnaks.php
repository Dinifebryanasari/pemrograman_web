<?php

namespace App\Filament\Admin\Resources\AnakResource\Pages;

use App\Filament\Admin\Resources\AnakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnaks extends ListRecords
{
    protected static string $resource = AnakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
