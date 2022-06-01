<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public const ADMIN_ID = 1;
    public const MANAGER_ID = 2;
    public const STOREKEEPER_ID = 3;
    public const COURIER_ID = 4;

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
