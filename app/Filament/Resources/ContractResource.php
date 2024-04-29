<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContractResource\Pages;
use App\Filament\Resources\ContractResource\RelationManagers;
use App\Models\Contract;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Contracts';
    protected static ?string $navigationLabel = 'Les Contracts';
    protected static ?string $navigationGroup = 'Gestion des contrats';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations générales')
                    ->schema([
                        Forms\Components\Select::make('tenant_id')
                            ->label('Locataire')
                            ->relationship('tenant', 'name')
                            ->required(),
                            Forms\Components\Select::make('property_id')
                            ->label('Bien')
                            ->relationship('property', 'name')
                            ->required()
                            ,
                            Forms\Components\Section::make('Informations sur le contrat')
                            ->schema([
                        Forms\Components\Datepicker::make('start_date')
                            ->label('Date de début de contrat')
                            ->required(),
                        Forms\Components\Datepicker::make('end_date')
                            ->label('Date de fin de contrat')
                            ->required(),

                            ])->columns(2),
                        Forms\Components\Section::make('Informations financières')
                            ->schema([
                        Forms\Components\TextInput::make('rent_amount')
                            ->label('Montant du loyer')
                            ->required(),
                        Forms\Components\TextInput::make('security_deposit')
                            ->label('Dépôt de garantie')
                            ->required(),
                            ])->columns(2),
                        Forms\Components\Section::make('Statut et image')
                            ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Statut')
                            ->options([
                                'pending' => 'En attente',
                                'active' => 'Actif',
                                'expired' => 'Expiré',
                            ])
                            ->required()
                            ->columnSpan(2)
                            ,
                        Forms\Components\FileUpload::make('image')
                            ->label('Image du contrat')
                            ->image()
                            ->columnSpan(2)
                            ,
                            ]),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tenant.name')
                    ->label('Locataire')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('property.name')
                    ->label('Bien')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Date de début')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Date de fin')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rent_amount')
                    ->label('Montant du loyer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('security_deposit')
                    ->label('Dépôt de garantie')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->searchable()
                    ->sortable(),


            ])
            ->filters([
                // filtré par statut

                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'En attente',
                        'active' => 'Actif',
                        'expired' => 'Expiré',
                    ])
                    ->label('Statut'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
