<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerContractResource\Pages;
use App\Filament\Resources\VolunteerContractResource\RelationManagers;
use App\Models\VolunteerContract;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VolunteerContractResource extends Resource
{
    protected static ?string $model = VolunteerContract::class;

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
            'index' => Pages\ListVolunteerContracts::route('/'),
            'create' => Pages\CreateVolunteerContract::route('/create'),
            'edit' => Pages\EditVolunteerContract::route('/{record}/edit'),
            'view' => Pages\ViewVolunteerContract::route('/{record}'),
        ];
    }
}
