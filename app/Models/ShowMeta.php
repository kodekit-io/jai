<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowMeta extends Model
{
    protected $fillable = [ 'show_id', 'meta_key', 'meta_value' ];
    public $timestamps = false;

    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
