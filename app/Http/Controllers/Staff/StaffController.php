<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateStaffRequest;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
use App\Role;

use Illuminate\Support\Facades\Hash;



class StaffController extends Controller
{


    public function staffHome()
    {
        $count_staff = 0;
        // $staffs = count(Staff::all());
        $staffs = count(Staff::where('id', '>', 2000)->get());
        $users = count(User::where('username', '>', 2000)->get());

        return view('staff.home', [
            'staff' => $staffs,
            'user' => $users,
        ]);

    }
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
            'date_birth'=> $request->get('date_birth'),
            'genre' => $request->get('genre'),
    		'email' =>$request->input('email'),
    		'address' => $request->get('address'), 
    		'phone_number' => $request->input('phone_number'), 
    		'position' => $request->input('position'),
        ]);

    	if ($check) {
    		$user= User::create([
    			'username'=> $request->input('id'),
    			'email' =>$request->input('email'),
    			'password' => Hash::make($request->input('id')), 

            
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
    	
    	return redirect('personal');
    }

    public function showStaff(Role $role, Staff $staff)
    {   
        
        $staff = Staff::where('id', '>', 2000)->get();
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

    public function roleEdit(Request $request, $id)
   {
    $admin = $request->input('admin');
    $mantenimiento = $request->input('mantenimiento');
    $personal = $request->input('personal');
    $inventario = $request->input('inventario');
    $operaciones = $request->input('operaciones');


    $role= Role::find($id);
    
    $role->Admin= $admin;
    $role->Mantenimiento = $mantenimiento;
    $role->Personal  = $personal;
    $role->Inventario  = $inventario;
    $role->Operaciones  = $operaciones;
    
    $role->save();
    $success = true;

    if ($success) {
        Session::flash('status','Success');

    }

    return redirect('personal/show');
   }

   public function showNewRoleForm($id)
   {
    $staff = Staff::where('id', $id)->first();

    return view('staff.new_role', [
        'staff' => $staff,
    ]);

   }

   public function newRoleCreated(Request $request, $id)
   {
    $staff = Staff::where('id', $id)->first();

    $user= User::create([
        'username'=> $staff->id,
        'email' => $staff->email,
        'password' => Hash::make($staff->id), 

    
       ]);
    
    $role = Role::create([
        'user_id'=> $user->id,
        'Admin' => $request->input('admin'),
        'Mantenimiento' => $request->input('mantenimiento'),
        'Personal' => $request->input('personal'),
        'Inventario' => $request->input('inventario'),
        'Operaciones' => $request->input('operaciones'),
    ]);
    $success = true;

    if ($success) {
        Session::flash('status','Success');

    }

    return redirect('personal');


   }

}
