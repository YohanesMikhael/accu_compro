<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'subtitle',
        'headline',
        'description',

        'hero_type',
        'image',
        'video',
        'video_poster',

        'button_text',
        'button_url',
        'secondary_button_text',
        'secondary_button_url',
    ];
}
