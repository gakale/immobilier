<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Paiements';
    protected static ?string $title = 'Paiements';
    protected static ?string $navigationGroup = 'Gestion des paiements';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type_of_payment')
                    ->label('Type de paiement')
                    ->required()
                    ->placeholder('Type de paiement'),
                Forms\Components\TextInput::make('amount')
                    ->label('Montant')
                    ->required()
                    ->placeholder('Montant'),
                Forms\Components\TextInput::make('payment_date')
                    ->label('Date de paiement')
                    ->required()
                    ->placeholder('Date de paiement')
                    ->type('date'),
                Forms\Components\TextInput::make('reference')
                    ->label('Référence')
                    ->required()
                    ->placeholder('Référence'),
                Forms\Components\TextInput::make('due_date')
                    ->label('Date d\'échéance')
                    ->required()
                    ->placeholder('Date d\'échéance')
                    ->type('date'),
                Forms\Components\TextInput::make('status')
                    ->label('Statut')
                    ->required()
                    ->placeholder('Statut'),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->placeholder('Slug'),
                Forms\Components\TextInput::make('paid_through')
                    ->label('Payé à travers')
                    ->required()
                    ->placeholder('Payé à travers')
                    ->type('date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // recupere le nom du locataire qui a a payé
                Tables\Columns\TextColumn::make('payment.tenant.name')
                    ->label('Locataire')
                    ->searchable()
                    ,
                Tables\Columns\TextColumn::make('type_of_payment')
                    ->label('Type de paiement')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Montant')
                    ->badge()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_date')
                    ->label('Date de paiement')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reference')
                    ->label('Référence')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->label('Date d\'échéance')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paid_through')
                    ->label('Payé à travers')
                    ->searchable()
                    ->sortable(),

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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
