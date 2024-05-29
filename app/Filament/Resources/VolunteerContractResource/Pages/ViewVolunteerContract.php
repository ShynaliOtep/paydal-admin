<?php

namespace App\Filament\Resources\VolunteerContractResource\Pages;

use App\Filament\Resources\VolunteerContractResource;
use App\Models\VolunteerContract;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ViewRecord;


class ViewVolunteerContract extends ViewRecord
{
    protected static string $resource = VolunteerContractResource::class;
    protected static ?string $title = 'Контракт волонтера';

    protected static string $view = 'filament.resources.volunteer-contract.pages.view-contract';

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getActions(): array
    {
        return [

        ];
    }
}
