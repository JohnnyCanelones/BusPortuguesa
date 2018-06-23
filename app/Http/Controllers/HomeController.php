<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Staff;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $user->load('staff', 'role');
        // $staff = Staff::where('id', $user->username)->first();

        $test = auth()->user()->staff();
        // dd($user->load('staff', 'role'));

        return view('home');
    }
}
