<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderDetail extends Model
{
    protected $fillable = ['slider_id', 'content', 'link', 'image_path'];

    public $timestamps = false;

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
}
