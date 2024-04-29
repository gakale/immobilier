<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class RentPaymentsTable extends Component
{
    use WithPagination;

    public $sortField = 'id'; // default sort field
    public $sortDirection = 'asc'; // default sort direction

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $tenant = Auth::guard('tenant')->user();
        $rentPayments = Payment::where('tenant_id', $tenant->id)
            ->where('type_of_payment', 'loyer')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.rent-payments-table', [
            'rentPayments' => $rentPayments,
        ]);
    }
}
