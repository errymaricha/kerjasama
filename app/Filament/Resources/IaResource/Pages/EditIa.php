<?php

namespace App\Filament\Resources\IaResource\Pages;

use App\Filament\Resources\IaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIa extends EditRecord
{
    protected static string $resource = IaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
