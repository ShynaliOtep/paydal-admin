<?php

namespace App\Filament\Resources\VolunteerContractResource\Pages;

use App\Filament\Resources\VolunteerContractResource;
use App\Models\Volunteer;
use App\Models\VolunteerContract;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListVolunteerContracts extends ListRecords
{
    protected static ?string $title = 'Контракт волонтера';
    protected static string $resource = VolunteerContractResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fio')->label('ФИО'),
                TextColumn::make('user.phone')->label('Номер телефона'),
                TextColumn::make('user.iin')->label('ИИН'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'waiting' => 'gray',
                        'confirmed' => 'success',
                        'rejected' => 'danger',
                    })->label('Статус')
            ])
            ->actions([
                Action::make('reject')->label('Отклонить')->color('danger')
                    ->form([
                        Textarea::make('reason')
                            ->label('Причина')
                    ])
                    ->action(function (array $data, VolunteerContract $record): void {
                        $record->reason = $data['reason'];
                        $record->status = 'rejected';
                        $record->save();
                    })->hidden(function (VolunteerContract $record) {return $record->status != "waiting";}),
                Action::make('confirm')->label('Подтвердить')->color('success')
                    ->action(function (VolunteerContract $record): void {
                        $record->status = 'confirmed';
                        $record->save();
                        $volunteer = new Volunteer();
                        $volunteer->contract_id = $record->id;
                        $volunteer->user_id = $record->user_id;
                        $volunteer->save();
                    })->hidden(function (VolunteerContract $record) {return $record->status != "waiting";}),
                ViewAction::make('view')
            ]);
    }

}
