<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [ 'name', 'user_id' ];

    public function details()
    {
        return $this->hasMany(SliderDetail::class);
    }
}
