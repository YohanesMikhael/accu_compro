<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'phone',
        'whatsapp',
        'email',
        'address',
        'maps_url',
        'maps_embed_url',
    ];
}
