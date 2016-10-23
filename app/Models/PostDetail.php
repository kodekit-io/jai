<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PostDetail extends Model
{
    use Sluggable;

    protected $fillable = ['post_id', 'lang', 'title', 'slug', 'content'];
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
