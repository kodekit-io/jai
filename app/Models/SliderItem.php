<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    protected $fillable = [ 'slider_id', 'lang', 'content', 'link', 'file_name', 'order' ];
    public $timestamps = false;

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }

}
