<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'sub_title',
        'description',
        'thumbnail',
        'gallery_images',
        'image_alt',
        'is_active',
        'show_on_landing_page',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_active' => 'boolean',
        'show_on_landing_page' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
