<?php

namespace App\Filament\Resources\VolunteerContractResource\Pages;

use App\Filament\Resources\VolunteerContractResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVolunteerContract extends ViewRecord
{
    protected static string $resource = VolunteerContractResource::class;

    protected static string $view = 'filament.resources.volunteer-contract.pages.view-contract';
}
