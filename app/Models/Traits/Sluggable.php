<?php

namespace App\Models\Traits;


use App\Models\Category;

trait Sluggable
{
    public function findBySlug($slug)
    {
        $slugField = $this->getSlugField();
        $slug = $this->where($slugField, $slug)->first();

        return $slug;
    }

    private function getSlugField()
    {
        return isset($this->slugField) ? $this->slugField : 'slug';
    }
}