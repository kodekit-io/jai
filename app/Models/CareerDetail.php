<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CareerDetail extends Model
{
    use Sluggable;

    protected $fillable = [ 'career_id', 'lang', 'slug', 'position', 'description' ];

    public $timestamps = false;

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
