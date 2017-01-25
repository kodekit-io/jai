<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(ShowDetail::class);
    }

    /**
     * A post may have multiple medias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'show_has_medias');
    }

    public function metas()
    {
        return $this->hasMany(ShowMeta::class);
    }
}
