<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [ 'department', 'active_date', 'contact_person' ];

    public function details()
    {
        return $this->hasMany(CareerDetail::class);
    }

    public function metas()
    {
        return $this->hasMany(CareerMeta::class);
    }
}
