<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'thumbnail',
        'thumbnail_alt',
        'engaging_content',
        'faqs',
        'is_active',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'engaging_content' => 'array',
        'faqs' => 'array',
        'is_active' => 'boolean',
    ];
}
