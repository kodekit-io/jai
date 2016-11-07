<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowDetail extends Model
{
    protected $fillable = [ 'show_id', 'title', 'slug', 'lang', 'content' ];

    protected $timestamps = false;

    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
