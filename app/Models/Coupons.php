<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $fillable = [ 'title', 'code', 'description', 'coupon_type', 'usage_type', 'value', 'created_by' ];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_has_coupons');
    }
}