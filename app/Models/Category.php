<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
        'show_on_header',
    ];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
