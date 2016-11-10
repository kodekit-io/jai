<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = [ 'show_type', 'created_by', 'day', 'start_date', 'end_date', 'start_time', 'end_time' ];

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
}
