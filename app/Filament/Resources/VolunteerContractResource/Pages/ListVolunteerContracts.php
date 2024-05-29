<?php

namespace App\Filament\Resources\VolunteerContractResource\Pages;

use App\Filament\Resources\VolunteerContractResource;
use App\Models\VolunteerContract;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListVolunteerContracts extends ListRecords
{
    protected static string $resource = VolunteerContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fio')->label('ФИО'),
                TextColumn::make('user.phone')->label('Номер телефона'),
                TextColumn::make('user.iin')->label('ИИН'),
                ImageColumn::make('frontImage.path')
            ])
            ->actions([
                Action::make('feature')
                    ->action(function (VolunteerContract $record) {
                        $record->is_featured = true;
                        $record->save();
                    }),
                Action::make('unfeature')
                    ->action(function (VolunteerContract $record) {
                        $record->is_featured = false;
                        $record->save();
                    }),
                ViewAction::make('view')
            ]);
    }

}
