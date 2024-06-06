<?php

namespace App\Filament\Resources\ViolationResource\Pages;

use App\Filament\Resources\ViolationResource;
use App\Models\Volunteer;
use App\Models\VolunteerContract;
use Closure;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ListViolations extends ListRecords
{
    protected static string $resource = ViolationResource::class;
    protected static ?string $title = 'Список поступленных заявление на нарушение';

    public function __construct()
    {
        $policeId = session()->get('police_id');
        //dump($policeId);
    }

    public function mount(): void
    {

    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('Обращение'),
                TextColumn::make('city.title')->label('Город'),
                TextColumn::make('volunteer.user.fio')->label('От'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'created' => 'gray',
                        'confirmed' => 'success',
                        'rejected' => 'danger',
                    })->label('Статус')
            ])
            ->actions([
                ViewAction::make('view')
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery()->withoutGlobalScopes();
        $query->where('status', 'created');
        return $query->orderBy('id', 'desc');
    }


    protected function getTableRecordUrlUsing(): ?Closure
    {
        return null;
    }
}
