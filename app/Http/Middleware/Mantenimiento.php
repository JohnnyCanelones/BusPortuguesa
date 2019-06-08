<?php

namespace App\Http\Middleware;

use Closure;

class Mantenimiento
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
        if (!auth()->user()->role->Mantenimiento) {
            if (auth()->user()->role->Inventario) {
                return redirect('/almacen');
            }elseif (auth()->user()->role->Personal) {
                return redirect('/personal');
            }
        }
        
        return $next($request);
    }
}

