<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    'sizes' => [
        ['width' => 200, 'height' => 200],
        ['width' => 150, 'height' => 150],
        ['width' => 500, 'height' => 500],
        ['width' => 500, 'height' => 300]
    ]

);
