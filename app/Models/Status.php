<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    public $timestamps = false;
    protected $table = 'statuses';

    public const CREATED_STATUS_ID = 1;
    public const READY_FOR_DELIVERY_STATUS_ID = 2;
    public const DELIVERY_STATUS_ID = 3;
    public const DELIVERED_STATUS_ID = 4;
    public const CANCELLED_STATUS_ID = 5;

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
