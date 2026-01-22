<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpiSection extends Model
{
    protected $fillable = ['tag', 'content'];

    protected $casts = [
        'content' => 'array',
    ];
}
