<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (!auth()->user()->role->Admin) {
            if (auth()->user()->role->Inventario) {
                return redirect('/almacen');
            }elseif (auth()->user()->role->Personal) {
                return redirect('/personal');
            }elseif (auth()->user()->role->Mantenimiento) {
                # code...
                return redirect('/mantenimiento');
            }
        }
        
        return $next($request);
    }
}

