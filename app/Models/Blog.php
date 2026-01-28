<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // Fillable fields
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'is_active',
        'image',
        'image_alt_text',
        'short_description',
        'description',
        'type',
        'read_time',

        // SEO fields
        'meta_title',
        'meta_keywords',
        'meta_description',

        // User tracking
        'created_by',
        'updated_by',
    ];

    // Relationships

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Creator of the blog
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Last updater of the blog
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
