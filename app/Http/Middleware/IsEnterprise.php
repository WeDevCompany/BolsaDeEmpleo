<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

class IsEnterprise
{
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! $this->auth->user()->isEnterprise()) 
        {
            if ($request->ajax() || $request->wantsJson()) 
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                abort(404);
            }

        }
        return $next($request);
    }

}
