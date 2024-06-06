<?php

namespace App\Filament\Resources\ViolationResource\Pages;

use App\Filament\Resources\ViolationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewViolation extends ViewRecord
{
    protected static string $resource = ViolationResource::class;
    protected static ?string $title = 'Заявка на нарушение';

    protected static string $view = 'filament.resources.violation.pages.view';

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getActions(): array
    {
        return [
            Actions\Action::make('reject')
        ];
    }
}
