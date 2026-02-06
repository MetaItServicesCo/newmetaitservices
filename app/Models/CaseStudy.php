<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    // Fillable fields for mass assignment
    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'image_alt',
        'gallary',
        'description',
        'document'
    ];

    // Cast JSON columns
    protected $casts = [
        'gallary' => 'array',
    ];
}
