<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'slug'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
