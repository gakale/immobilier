<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Tenant extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'property_id',
        'start_date',
        'end_date',
        'rent_amount',
        'security_deposit',
        'status',
        'user_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
