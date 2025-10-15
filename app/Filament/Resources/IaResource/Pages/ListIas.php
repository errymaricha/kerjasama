<?php

namespace App\Filament\Resources\IaResource\Pages;

use App\Filament\Resources\IaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIas extends ListRecords
{
    protected static string $resource = IaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
