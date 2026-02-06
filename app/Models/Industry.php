<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'image_alt',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'sub_details',
    ];

    protected $casts = [
        'sub_details' => 'array',
    ];
}
