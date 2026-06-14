<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    /**
     * Attributes that are not mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * Attributes that should be cast to native types
     */
    protected $casts = [
        'before' => 'array',
        'after' => 'array',
        'tags' => 'array',
    ];

    /**
     * Get the user that owns the audit trail.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the model that owns the audit trail.
     */
    public function loggable()
    {
        return $this->morphTo();
    }
}
