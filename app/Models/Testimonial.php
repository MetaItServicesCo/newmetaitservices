<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'title',
        'image',
        'image_alt',
        'rating',
        'is_active',
        'short_description',
        'highlight_percentage',
        'highlight_title',
        'created_by',
        'updated_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
