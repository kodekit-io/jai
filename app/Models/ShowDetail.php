<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ShowDetail extends Model
{
    use Sluggable;

    protected $fillable = [ 'show_id', 'title', 'slug', 'lang', 'content' ];

    public $timestamps = false;

    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
