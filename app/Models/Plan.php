<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
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
        return $this->belongsToMany(Feature::class, 'plan_feature');
    }

}
