<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'model',
        'can'
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }

    //Get all users who have roles with this permission
    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, Role::class);
    }
}
