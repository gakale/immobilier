<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id', // Ajoutez cette ligne
        'tenant_id',
        'type_of_payment',
        'amount',
        'payment_date',
        'reference',
        'due_date',
        'status',
        'slug',
        'paid_through',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}