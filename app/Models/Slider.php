<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [ 'title', 'user_id', 'publish_date' ];

    public function items()
    {
        return $this->hasMany(SliderItem::class);
    }
}
