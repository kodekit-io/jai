<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSize extends Model
{
    protected $fillable = ['media_id', 'title', 'path', 'mime_type', 'width', 'height'];
    public $timestamps = false;

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
