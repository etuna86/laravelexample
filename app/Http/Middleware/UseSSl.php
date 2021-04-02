<?php

namespace App\Http\Middleware;

use Closure;

class UseSSl
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
        if( App::environment('local') ){
            return Redirect::secure($request->path());
        }

        return $next($request);
    }
}
