<?php

namespace App\Http\Middleware;

use Closure;

class Personal
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
        if (!auth()->user()->role->Personal) {
            if (auth()->user()->role->Inventario) {
                return redirect('/almacen');
            }elseif (auth()->user()->role->Mantenimiento) {
                # code...
                return redirect('/mantenimiento');
            }
        }
        return $next($request);
    }
}
