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
            
            $user =  Auth::user();
            $user->login = 1;
            $user->save();
            Auth::logoutOtherDevices($request->input('password'));
            // return $user;

            
            if (auth()->user()->hasRole('', '1')) {
                        return redirect( '/mantenimiento');
            }
            elseif (auth()->user()->hasRole('1', '')) {
                        return redirect( '/presidente');
            }
            elseif (auth()->user()->hasRole2('1', '')) {
                return redirect( '/personal');
            }
            elseif (auth()->user()->hasRole2('', '1')) {
                return redirect( '/almacen');
            }
            elseif (auth()->user()->hasRole3('1')) {
                return redirect( '/operaciones');
            }
            return  redirect('/');

        }
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

    protected function logout()
    {
        $user = Auth::user();
        $user->login = 0;
        $user->save();
        // Auth::logout();
        // Auth::flush();
        Auth::logout();
        // Auth::logoutOtherDevices($user->password);
        return redirect('/login');

        // emitimos evento de deslogado
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
