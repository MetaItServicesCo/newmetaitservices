<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'is_subscribed',
        'ip_address',
        'user_agent',
        'subscribed_at',
        'unsubscribed_at',
    ];

    protected $casts = [
        'is_subscribed' => 'boolean',
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];

    /**
     * Scope to get only active subscriptions
     */
    public function scopeActive($query)
    {
        return $query->where('is_subscribed', true);
    }

    /**
     * Subscribe email
     */
    public static function subscribe($email, $ipAddress = null, $userAgent = null)
    {
        return self::updateOrCreate(
            ['email' => $email],
            [
                'is_subscribed' => true,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
            ]
        );
    }

    /**
     * Unsubscribe email
     */
    public function unsubscribe()
    {
        return $this->update([
            'is_subscribed' => false,
            'unsubscribed_at' => now(),
        ]);
    }
}
