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
    public function handle($request, Closure $next, $user1, $user2)
    {
        if (! $request->user()->hasRole($user1, $user2)) {
            if (! $request->user()->hasRole('', '1')) {
                if ($request->user()->hasRole('1', '')) {
                    return redirect('/admin');
                }
                elseif ($request->user()->hasRole2('1', '')) {
                    return redirect('/personal');
                }
                elseif ($request->user()->hasRole2('', '1')) {
                    return redirect('/inventario');
                }
                elseif ($request->user()->hasRole3('1')) {
                    return redirect('/operaciones');
                }
            }else {
                
            }
        }
        return $next($request);
    }
}

