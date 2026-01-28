<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'bio',
        'image',
        'image_alt',
        'email',
        'phone',
        'linkedin_url',
        'twitter_url',
        'facebook_url',
        'instagram_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
