<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

class register
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed\Auth::check()
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::check()) 
        {
            abort(404);

        }
        return $next($request);
    }
}