<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Menu extends Model
{
    protected $fillable = ['name', 'display', 'parent_id', 'link', 'permission', 'icon_class', 'description', 'order'];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
