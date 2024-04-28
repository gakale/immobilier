<?php

namespace App\Filament\Resources\PropertyTypeResource\Pages;

use App\Filament\Resources\PropertyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPropertyTypes extends ListRecords
{
    protected static string $resource = PropertyTypeResource::class;
    protected static  ?string $title = 'Liste des types de propriétés';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Ajouter un type de propriété')
            ,
        ];
    }
}
