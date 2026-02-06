<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceInquiry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'country_code',
        'has_website',
        'services',
        'message',
        'status',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'services' => 'array',
        'has_website' => 'boolean',
    ];

    /**
     * Get full name
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
