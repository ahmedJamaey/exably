<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plans extends Model
{
    protected $fillable = [
        'name',
        'duration_unit',
        'description',
        'price',
        'discount_price',
        'discount_type'
    ];

    public function features()
    {
        return $this->belongsToMany(features::class, 'plan_feature');
    }

}

class features extends Model
{
    protected $fillable = [
        'name',
        'description',
        'key',
        'value'
    ];

    public function plans()
    {
        return $this->belongsToMany(plans::class, 'plan_feature');
    }
}

class plan_feature extends Model
{
    protected $fillable = [
        'plan_id',
        'feature_id',
    ];
}
