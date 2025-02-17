<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Instansi
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
        if (Auth::user() &&  Auth::user()->role == 'instansi') {
            return $next($request);
        }
        elseif(Auth::user() &&  Auth::user()->role == 'admin') {
            return $next($request);
        }
    return redirect('/home');
    }
}
