<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProtocolResource\Pages;
use App\Filament\Resources\ProtocolResource\RelationManagers;
use App\Models\Protocol;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProtocolResource extends Resource
{
    protected static ?string $model = Protocol::class;
    protected static ?string $title = 'История обращении';
    protected static ?string $navigationLabel = 'История обращении';
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
            'index' => Pages\ListProtocols::route('/'),
            'create' => Pages\CreateProtocol::route('/create'),
            'create_pdd' => Pages\CreatePddProtocol::route('/create/pdd'),
        ];
    }



    public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->user()->police_id;
    }
}
