<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        $user = auth()->user();
        if (Auth::check()) {
            if($user->esRepositor()) {
                return $next($request);
            }
            else abort(403);
        }
        else return redirect()->route('login');

    }
}
