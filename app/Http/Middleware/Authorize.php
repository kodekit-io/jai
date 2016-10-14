<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeName = $request->route()->getName();
        $user = Auth::user();
        if (! $user->can($routeName)) {
            return backendRedirect('/')->withErrors(['unauthorized' => 'You are not authorized to access the page.']);
        }

        return $next($request);
    }
}
