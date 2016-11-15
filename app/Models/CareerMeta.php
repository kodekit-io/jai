<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerMeta extends Model
{
    protected $fillable = [ 'career_id', 'meta_key', 'meta_value' ];
    public $timestamps = false;

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
