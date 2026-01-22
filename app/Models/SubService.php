<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'short_description',
        'main_points',
        'page_content',
        'is_active',
        'show_on_services_page',
    ];

    protected $casts = [
        'main_points' => 'array',
        'page_content' => 'array',
        'is_active' => 'boolean',
        'show_on_services_page' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Services::class);
    }
}
