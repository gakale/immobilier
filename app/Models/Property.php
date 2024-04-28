<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'bedrooms',
        'bathrooms',
        'area',
        'price',
        'for_sale',
        'for_rent',
        'slug',
        'image',
        'property_type_id',
    ];

    public function propertyType()
    {
        return $this->belongsTo(property_Type::class);
    }


}
