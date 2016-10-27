<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'slug', 'content', 'post_type_id', 'status', 'publish_date', 'created_by'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_has_categories');
    }

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    public function details()
    {
        return $this->hasMany(PostDetail::class);
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

    public function metas()
    {
        return $this->hasMany(PostMeta::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
