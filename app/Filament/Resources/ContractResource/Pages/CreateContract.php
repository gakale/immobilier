<?php

namespace App\Filament\Resources\ContractResource\Pages;

use App\Filament\Resources\ContractResource;
use App\Models\Tenant;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContract extends CreateRecord
{
    protected static string $resource = ContractResource::class;
    protected static ?string $title = 'Créer un contrat';


    protected function afterCreate(): void
    {
        // Mettre à jour le modèle Tenant correspondant
        $tenant = Tenant::find($this->record->tenant_id);
        $tenant->update([
            'property_id' => $this->record->property_id,
            'start_date' => $this->record->start_date,
            'end_date' => $this->record->end_date,
            'rent_amount' => $this->record->rent_amount,
            'security_deposit' => $this->record->security_deposit,
            'status' => 'active',
        ]);
    }
}
