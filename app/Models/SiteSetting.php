<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'company_name',
        'tagline',
        'logo',
        'favicon',
        'email',
        'phone',
        'whatsapp',
        'address',
        'map_embed_url',
        'instagram',
        'facebook',
        'linkedin',
        'footer_text',
    ];
}
