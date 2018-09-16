<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        // Primero revisamos si inicio session
        // if (!auth()->check()){
        //     return redirect('login');
        // }
        // Si inicio Sesion verificamos si es admin
        if (!auth()->user()->admin){
            return redirect('/');
        }
        return $next($request);
    }
}
