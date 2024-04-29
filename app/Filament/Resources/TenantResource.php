<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TenantResource\Pages;
use App\Filament\Resources\TenantResource\RelationManagers;
use App\Models\Tenant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Section;
class TenantResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Locataires';
    protected static ?string $title = 'Locataires';
    protected static ?string  $navigationGroup = 'Gestion des locataires';
    protected static ?int $navigationSort  = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom complet')
                        ->required()
                        ->placeholder('Nom complet du locataire'),
                    Forms\Components\TextInput::make('email')
                        ->label('Adresse email')
                        ->required()
                        ->placeholder('Adresse email du locataire'),

                ]),
        Section::make()
        ->schema([
            Forms\Components\TextInput::make('password')
                ->label('Mot de passe')
                ->required()
                ->placeholder('Mot de passe du locataire')
                ->password()
                ->autocomplete('new-password'),

        ])
        ->columns(1),
        Section::make()
        ->schema([
            Forms\Components\TextInput::make('phone')
                ->label('Téléphone')
                ->placeholder('Numéro de téléphone du locataire'),
            Forms\Components\TextInput::make('start_date')
                ->label('Date de début')
                ->placeholder('Date de début du contrat')
                ->type('date'),
            Forms\Components\TextInput::make('end_date')
                ->label('Date de fin')
                ->placeholder('Date de fin du contrat')
                ->type('date'),
        ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nom complet'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Adresse email'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Téléphone'),
                Tables\Columns\TextColumn::make('start_date')

                    ->label('Date de début de contrat'),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Date de fin de contrat'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut du locataire'),

            ])
            ->filters([
                // je veux filtré par status du locataire
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'En attente',
                        'active' => 'Actif',
                        'inactive' => 'Inactif',
                    ])
                    ->label('Statut du locataire'),
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
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
