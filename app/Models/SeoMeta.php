<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    protected $table = 'seo_meta';

    protected $fillable = [
        'page_name',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'is_active',
    ];
}