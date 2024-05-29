<?php

namespace App\Filament\Resources\VolunteerContractResource\Pages;

use App\Filament\Resources\VolunteerContractResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVolunteerContract extends EditRecord
{
    protected static string $resource = VolunteerContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
