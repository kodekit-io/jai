<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['title', 'file_name', 'description'];

    /**
     * A media may have multiple posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_has_medias');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_has_medias');
    }

    public function shows()
    {
        return $this->belongsToMany(Show::class, 'show_has_medias');
    }

    public function mediaSizes()
    {
        return $this->hasMany(MediaSize::class);
    }
}
