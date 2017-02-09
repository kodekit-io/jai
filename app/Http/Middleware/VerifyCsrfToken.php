<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'doku/result',
        'doku/notify',
        'doku/review',
        'doku/identify',

        'cimb/result',
        'cimb/backend',

        '*/cimb/result',
        '*/cimb/backend',

        'cimb-credit-card/result',
        '*/cimb-credit-card/result',
    ];
}
