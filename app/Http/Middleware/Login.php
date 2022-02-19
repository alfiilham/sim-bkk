<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        if(auth()->user()->role == 'admin'){
            return redirect('home');
        }
        elseif(auth()->user()->role == 'instansi'){
            return redirect('instansi');
        }
            return redirect('user');
    }
}

