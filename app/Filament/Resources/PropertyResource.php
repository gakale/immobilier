<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Proprétés';
    protected static ?string $navigationGroup ="Gestion des biens";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                        Wizard\Step::make('informations générales')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Nom')
                                ->required(),
                            Forms\Components\Textarea::make('description')
                                ->label('Description')
                                ->required(),
                            Forms\Components\TextInput::make('type')
                                ->label('Type'),
                            Forms\Components\Select::make('property_type_id')
                                ->label('Type de propriété')
                                ->relationship('propertyType', 'name')
                                ->required(),
                            Forms\Components\TextInput::make('slug')
                                ->label('Slug')
                                ->required(),
                         ]),
                        Wizard\Step::make('Caractéristiques')
                            ->schema([
                                Forms\components\TextInput::make('bedrooms')
                                    ->label('Chambres')
                                    ->numeric()
                                    ->required(),
                                Forms\components\TextInput::make('bathrooms')
                                    ->label('Salles de bain')
                                    ->numeric()
                                    ->required(),
                                Forms\components\TextInput::make('area')
                                    ->label('Surface')
                                    ->numeric()
                                    ->required(),
                                Forms\components\TextInput::make('price')
                                    ->label('Prix')
                                    ->numeric()
                                    ->required(),

                            ]),
                        Wizard\Step::make('Visibilité et image')
                            ->schema([
                                Forms\Components\Select::make('visibility')
                                    ->label('Visibilité')
                                    ->options([
                                        'for_sale' => 'En vente',
                                        'for_rent' => 'En location',
                                    ]),
                                Forms\Components\FileUpload::make('image')
                                    ->label('Image')
                                    ->previewable()
                                    ->image(),

                    ]),

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Prix'),
                Tables\Columns\TextColumn::make('area')
                    ->badge()
                    ->label('Surface'),
                Tables\Columns\TextColumn::make('for_sale')
                ->label('En vente')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    '0' => 'danger', // Not for sale
                    '1' => 'success', // For sale
                    default => 'gray', // Unknown state
                }),
                Tables\Columns\ImageColumn::make('image')

                ])
            ->filters([

                SelectFilter::make('for_sale')
                ->label('En vente')
                ->options([
                    'for_sale' => 'En vente',
                    'for_rent' => 'En location',
                ]),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
