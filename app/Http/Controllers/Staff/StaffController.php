<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateStaffRequest;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
use App\Role;
Use Session;

use Illuminate\Support\Facades\Hash;



class StaffController extends Controller
{
    public function showStaffForm()
    {
    	return view('staff.register');
    }

    public function staffCreate(CreateStaffRequest $request) 
    {
    	$success = false;
    	$check = $request->get('cargo');
    	$staff = Staff::create([
    		'nationality' => $request->get('nacionality'),
    		'id' => $request->input('id'), 
    		'names' => $request->input('names'),
    		'last_names' => $request->input('last_names'),
    		'genre' => $request->get('genre'),
    		'address' => $request->get('address'), 
    		'phone_number' => $request->input('phone_number'), 
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
        $success = true;

        if ($success) {
            Session::flash('status','Success');

        }
    	
    	return redirect('/home');
    }

    public function showStaff(Role $role, Staff $staff)
    {   
        
        $staff = Staff::all();
        $role = Role::all();

        $staff->load('user');

        return view('staff.show', [
            'staff' => $staff,
            'role' => $role,
        ]);
    }

    public function showRole($id)
    {
        $permiso = User::where('username', $id)->first();

        $permiso->load('role');

        return view('staff.role_edit', [
            'permiso' => $permiso,
        ]);
    }
}
