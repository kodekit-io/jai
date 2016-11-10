<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageMeta extends Model
{
    protected $fillable = [ 'package_id', 'meta_key', 'meta_value' ];

    public $timestamps = false;

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
