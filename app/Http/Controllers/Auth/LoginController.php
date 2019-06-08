<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; // extensión del fakade
use Illuminate\Http\Request;
use Session;


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
    protected function sendLoginResponse(Request $request)
    {
      
        if(Auth::check()){
            // dd('gola');
          
            Auth::logoutOtherDevices($request->input('password'));
            // return $user;

            
            if (auth()->user()->hasRole('', true)) {
                        return redirect( '/mantenimiento');
            }
            elseif (auth()->user()->hasRole(true, '')) {
                        return redirect( '/presidente');
            }
            elseif (auth()->user()->hasRole2(true, '')) {
                return redirect( '/personal');
            }
            elseif (auth()->user()->hasRole2('', true)) {
                return redirect( '/almacen');
            }
            elseif (auth()->user()->hasRole3(true)) {
                return redirect( '/operaciones');
            }
            return  redirect('/');

        }
    } 
    
   
    
    public function redirectPath()
    {
        if (auth()->user()->hasRole('', true)) {
                    return '/mantenimiento';
        }
        elseif (auth()->user()->hasRole(true, '')) {
                    return '/presidente';
        }
        elseif (auth()->user()->hasRole2(true, '')) {
            return '/personal';
        }
        elseif (auth()->user()->hasRole2('', true)) {
            return '/almacen';
        }
        elseif (auth()->user()->hasRole3(true)) {
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
        // return redirect('/login');

        
        
    }

    // public function username()
    // {
    //     return 'username';
    // }


}
