<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'post_type_id', 'status', 'publish_date'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_has_categories');
    }

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    /**
     * A post may have multiple medias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'post_has_medias');
    }
}
