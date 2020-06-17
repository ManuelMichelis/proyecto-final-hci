<?php

namespace App\Http\Middleware;

use Closure;

class EsRepositor
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
        if(auth()->user()->esRepositor()) {
            return $next($request);
        }
        return redirect('home');
    }
}
