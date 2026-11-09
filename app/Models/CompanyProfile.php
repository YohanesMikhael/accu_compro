<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'business_license',
        'address',
        'covered_area',
        'phone',
        'email',
    ];
}
