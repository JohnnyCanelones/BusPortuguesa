<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    public function username()
    {
        return 'username';
    }
    
    public function redirectPath()
    {
        if (auth()->user()->hasRole('', '1')) {
                    return '/mantenimiento';
        }
        elseif (auth()->user()->hasRole('1', '')) {
                    return '/presidente';
        }
        elseif (auth()->user()->hasRole2('1', '')) {
            return '/personal';
        }
        elseif (auth()->user()->hasRole2('', '1')) {
            return '/almacen';
        }
        elseif (auth()->user()->hasRole3('1')) {
            return '/operaciones';
        }
        return '/';
        // return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function username()
    // {
    //     return 'username';
    // }


}
