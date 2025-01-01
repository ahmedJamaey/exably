<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'model',
        'can'
    ];

    public function roles()
    {
        return $this->belongsToMany(roles::class, 'role_permission');
    }
}
