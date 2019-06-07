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
    public function handle($request, Closure $next, $user1, $user2)
    {
        if (! $request->user()->hasRole($user1, $user2)) {
            if (! $request->user()->hasRole(true, '')) {
                if ($request->user()->hasRole('', true)) {
                    return redirect('/mantenimiento');
                }
                elseif ($request->user()->hasRole2(true, '')) {
                    return redirect('/personal');
                }
                elseif ($request->user()->hasRole2('', true)) {
                    return redirect('/almacen');
                }
                elseif ($request->user()->hasRole3(true)) {
                    return redirect('/operaciones');
                }
            }else {
                
            }
        }
        return $next($request);
    }
}

