<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
use App\Role;
use Illuminate\Support\Facades\Hash;



class StaffController extends Controller
{
    public function showStaffForm()
    {
    	return view('staff.register');
    }

    public function staffCreate(Request $request) 
    {
    	
    	$check = $request->get('cargo');
    	$staff = Staff::create([
    		'nationality' => $request->get('nacionality'),
    		'id' => $request->input('cedula'), 
    		'names' => $request->input('name'),
    		'last_names' => $request->input('last_name'),
    		'genre' => $request->input('genre'),
    		'address' => $request->get('address'), 
    		'phone_number' => $request->input('phone'), 
    		'position' => $request->input('position'),
    	]);

    	if ($check) {
    		$user= User::create([
    			'username'=> $request->input('cedula'),
    			'email' =>$request->input('email'),
    			'password' => Hash::make($request->input('cedula')), 

    		]);
    		$role = Role::create([
    			'user_id'=> $user->id,
    			'Admin' => $request->input('admin'),
    			'Mantenimiento' => $request->input('mantenimiento'),
    			'Personal' => $request->input('personal'),
    			'Inventario' => $request->input('inventario'),
    			'Operaciones' => $request->input('operaciones'),
    		]);	
    	}
    	
    	return redirect('home');
    }
}
