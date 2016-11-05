<?php

namespace App\Http\Middleware;

use App\Service\MenuGenerator as MG;
use Closure;
use Illuminate\Support\Facades\View;

class MenuGenerator
{
    /**
     * @var MG
     */
    private $generator;

    /**
     * MenuGenerator constructor.
     */
    public function __construct(MG $generator)
    {
        $this->generator = $generator;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        $menu = $this->generator->generateMenu($request, $type);
        View::share('menu', $menu);

        $user = \Auth::user();
        View::share('gUser', $user);

        return $next($request);
    }
}
