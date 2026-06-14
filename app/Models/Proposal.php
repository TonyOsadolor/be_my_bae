<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AuditTrailTrait;
use App\Traits\UUID;

class Proposal extends Model
{
    use UUID, AuditTrailTrait;
    /**
     * Attributes that are not mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * Get the route key name for Laravel route model binding.
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Get the activity log message for the model.
     */
    public function activities()
    {
        return $this->morphMany(AuditTrail::class, 'loggable');
    }
}
