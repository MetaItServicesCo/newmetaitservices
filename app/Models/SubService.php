<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'icon',
        'short_description',
        'main_points',
        'page_content',
        'is_active',
        'show_on_services_page',
        'show_on_landing_page',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    protected $casts = [
        'main_points' => 'array',
        'page_content' => 'array',
        'is_active' => 'boolean',
        'show_on_services_page' => 'boolean',
        'show_on_landing_page' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Services::class);
    }
}
