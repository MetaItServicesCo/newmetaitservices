<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectRequest extends Model
{
    use SoftDeletes;

    protected $table = 'project_requests';

    protected $fillable = [
        'selected_date',
        'weekday',
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_name',
        'website_url',
        'message',
        'deleted_at' 
    ];

    protected $casts = [
        'selected_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get full name
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
