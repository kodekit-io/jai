<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [ 'package_type_id', 'galasys_product_id', 'normal_price', 'weekend_price', 'holiday_price', 'created_by', 'is_general_admission', 'order' ];

    public function coupons()
    {
        return $this->belongsToMany(Coupons::class, 'package_has_coupons');
    }

    public function medias()
    {
        return $this->belongsToMany(Media::class, 'package_has_medias');
    }

    public function details()
    {
        return $this->hasMany(PackageDetail::class);
    }

    public function metas()
    {
        return $this->hasMany(PackageMeta::class);
    }
}
