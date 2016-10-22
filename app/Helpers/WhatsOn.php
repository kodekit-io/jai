<?php

namespace App\Helpers;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class WhatsOn implements FilterInterface
{

    public function applyFilter(Image $image)
    {
        return $image->fit(382);
    }
}