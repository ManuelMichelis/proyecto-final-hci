<?php

namespace App\Http\Middleware;

use Closure;

class EsVendedor
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
        if(auth()->user()->esVendedor()) {
            return $next($request);
        }
        return redirect('home');
    }
}
