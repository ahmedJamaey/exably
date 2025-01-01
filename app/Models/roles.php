<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function users()
    {
        return $this->hasMany(users::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(permissions::class, 'role_permission');
    }
}
