<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'postal_code',
        'sold',
        'surface',
        'address'
    ];
}
