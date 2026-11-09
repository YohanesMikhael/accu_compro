<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerPosition extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'location',
        'employment_type',
        'description',
        'requirements',
        'application_url',
        'deadline',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'deadline' => 'date',
    ];
}