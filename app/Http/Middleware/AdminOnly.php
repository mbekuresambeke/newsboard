<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::check() && !Auth::user()->isAdmin()){

            return redirect(url('/'));

        }
        return $next($request);
    }
}
