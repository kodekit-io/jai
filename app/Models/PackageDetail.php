<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    use Sluggable;

    protected $fillable = [ 'package_id', 'lang', 'title', 'slug', 'content' ];

    public $timestamps = false;

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
