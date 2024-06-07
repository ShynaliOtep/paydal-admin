<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ViolationResource\Pages;
use App\Filament\Resources\ViolationResource\RelationManagers;
use App\Models\Violation;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ViolationResource extends Resource
{
    protected static ?string $model = Violation::class;
    protected static ?string $title = 'Список поступленных заявление на нарушение';
    protected static ?string $navigationLabel = 'Список нарушение';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListViolations::route('/'),
            'create' => Pages\CreateViolation::route('/create'),
            'edit' => Pages\EditViolation::route('/{record}/edit'),
            'view' => Pages\ViewViolation::route('/{record}'),
            'reject' => Pages\RejectViolation::route('/reject/t'),
        ];
    }

    /**
     * @return bool
     */
    public static function shouldRegisterNavigation(): bool
    {
        return (bool) Filament::auth()->user()->police_id;
    }
}
