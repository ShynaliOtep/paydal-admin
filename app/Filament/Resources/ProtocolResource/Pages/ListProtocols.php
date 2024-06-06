<?php

namespace App\Filament\Resources\ProtocolResource\Pages;

use App\Filament\Resources\ProtocolResource;
use Closure;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ListProtocols extends ListRecords
{
    protected static string $resource = ProtocolResource::class;

    protected static ?string $title = 'История обращении';

    public function __construct()
    {

    }

    public function mount(): void
    {

    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('Обращение'),
                TextColumn::make('violation.city.title')->label('Город'),
                TextColumn::make('violation.volunteer.user.fio')->label('От'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'created' => 'gray',
                        'confirmed' => 'success',
                        'rejected' => 'danger',
                    })->label('Статус')
            ])
            ->actions([]);
    }

    protected function getHeaderActions(): array
    {
        return [

        ];
    }

    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery()->withoutGlobalScopes();
        if (Filament::auth()->user()->police_id) {
            $query->where('police_id', '=', Filament::auth()->user()->police_id);
        }
        return $query->orderBy('id', 'desc');
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return null;
    }
}
