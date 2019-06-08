<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateStaffRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Staff;
use App\Role;
use App\Almacen;
use App\StaffMonitoring;
use Barryvdh\DomPDF\Facade as PDF;


use Illuminate\Support\Facades\Hash;



class StaffController extends Controller
{

    public function staffHome()
    {
        
            $user = Auth::user();


        // $staffs = count(Staff::all());

        $staffs = count(Staff::where('id', '>', 2000)->get());
        $users = count(User::where('username', '>', 2000)->get());

        return view('staff.home', [
            'staff' => $staffs,
            'user' => $users,
            'usuario_activo' => $user,
        ]);

    }
    public function showStaffForm()
    {
        $admin = Role::where('Admin', 1)->first();
        // dd($admin->user->staff);
        return view('staff.register', [
            'hasAdmin' => $admin
        ]);
    }

    public function staffCreate(CreateStaffRequest $request) 
    {
        $success = false;
        $check = $request->get('cargo');
        $staff = Staff::create([
            'nationality' => $request->get('nacionality'),
            'id' => $request->get('id'), 
            'names' => $request->get('names'),
            'last_names' => $request->get('last_names'),
            'date_birth'=> $request->get('date_birth'),
            'genre' => $request->get('genre'),
            'email' =>$request->get('email'),
            'address' => $request->get('address'), 
            'phone_number' => $request->get('phone_number'), 
            'position' => $request->get('position'),
        ]);
        dd($staff);
        $monitoreo = StaffMonitoring::create([
            'user_id' => Auth::user()->id,
            'staff_id' => $request->input('id'),
            'accion' => 'Empleado Creado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
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
            $monitoreoRol = StaffMonitoring::create([
            'user_id' => Auth::user()->id,
            'staff_id' => $request->input('id'),
            'accion' => 'Rol Creado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
            ]);
    	}
        $success = true;

        if ($success) {
            Session::flash('status','Empleado Creado');

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

    public function showUsers()
    {   
        
        $users = User::where('username', '>', 2000)->get();

        $users->load('role');
        // dd($users);

        return view('staff.showUsers', [
            'users' => $users,
        ]);
    }

    public function staffEditForm($id)
    {
        $staff = Staff::find($id);
        // dd($staff);
        return view('staff.editStaff', [
            'staff' => $staff,
        ]);
    }

    public function staffUpdate(Request $request, $id)
    {
        $staff = Staff::find($id);

        $staff->nationality = $request->get('nacionality');
        $staff->id = $request->input('id');
        $staff->names = $request->input('names'); 
        $staff->last_names = $request->input('last_names'); 
        $staff->date_birth = $request->get('date_birth');
        $staff->genre = $request->get('genre');
        $staff->email = $request->input('email');
        $staff->address = $request->get('address');
        $staff->phone_number = $request->input('phone_number'); 
        $staff->position = $request->input('position');
        $staff->save();

        $monitoreo = StaffMonitoring::create([
            'user_id' => Auth::user()->id,
            'staff_id' => $request->input('id'),
            'accion' => 'Empleado editado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

        $success = true;

        if ($success) {
            Session::flash('status','Empleado editado');

        }

        return redirect('/personal');



    }
    public function staffEditForm2($id)
    {
        $staff = Staff::find($id);
        // dd($staff);
        return view('staff.editStaff2', [
            'staff' => $staff,
        ]);
    }

    public function staffUpdate2(Request $request, $id)
    {
        $staff = Staff::find($id);

        // $staff->nationality = $request->get('nacionality');
        // $staff->id = $request->input('id');
        $staff->names = $request->input('names'); 
        $staff->last_names = $request->input('last_names'); 
        $staff->date_birth = $request->get('date_birth');
        // $staff->genre = $request->get('genre');
        $staff->email = $request->input('email');
        $staff->address = $request->get('address');
        $staff->phone_number = $request->input('phone_number'); 
        // $staff->position = $request->input('position');
        $staff->save();

        $monitoreo = StaffMonitoring::create([
            'user_id' => Auth::user()->id,
            'staff_id' => $request->input('id'),
            'accion' => 'Empleado editado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

        $success = true;

        if ($success) {
            Session::flash('status','Empleado editado');

        }

        return redirect('/personal');



    }

    public function showRole($id)
    {
        $permiso = User::where('username', $id)->first();
        $permiso->load('role');
        $admin = Role::where('Admin', 1)->first();
                
                
        return view('staff.role_edit', [
            'permiso' => $permiso,
            'hasAdmin' => $admin
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
    $monitoreoRol = StaffMonitoring::create([
        'user_id' => Auth::user()->id,
        'staff_id' => $role->user->staff->id,
        'accion' => 'Rol Editado', 
        'fecha_accion' => date("Y-m-d H:i:s"),
    ]);
    $success = true;

    if ($success) {
        Session::flash('status','Nivel de usuario editado');

    }

    return redirect('/personal');
   }

   public function showNewRoleForm($id)
   {
    $staff = Staff::where('id', $id)->first();
    $admin = Role::where('Admin', 1)->first();
    
    
    return view('staff.new_role', [
        'staff' => $staff,
        'hasAdmin' => $admin
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
         $monitoreoRol = StaffMonitoring::create([
            'user_id' => Auth::user()->id,
            'staff_id' => $staff->id,
            'accion' => 'Rol Creado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);
        $success = true;

        if ($success) {
            Session::flash('status','Nivel de Usuario Creado');

        }

        return redirect('personal');
   }

   public function showStaffPdf()
    {
        $staff = Staff::where('id', '>', 2000)->get();
        
        $pdf = PDF::loadView('staff.pdf.personalPdf', compact('staff'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('PDF Personal BusPortuguesa '. date("d-m-Y") .'.pdf');   
        
        // return view('staff.pdf.personalPdf', ['staff' => $staff]);
    }
    public function showUsersPdf()
    {
        $users = User::where('username', '>', 2000)->get();
        
        $pdf = PDF::loadView('staff.pdf.usersPdf', compact('users'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('PDF Usuarios BusPortuguesa '. date("d-m-Y") .'.pdf');   
        
        // return view('staff.pdf.personalPdf', ['staff' => $staff]);
    }

}
