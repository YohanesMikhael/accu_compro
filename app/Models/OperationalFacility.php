<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperationalFacility extends Model
{
    protected $fillable = [
        'name',
        'type',
        'quantity',
        'capacity',
        'description',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'quantity' => 'integer',
    ];
}
