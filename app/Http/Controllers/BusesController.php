<?php

namespace App\Http\Controllers;

// use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Buses;
use App\Staff;

class BusesController extends Controller
{
    public function showBusForm()
    {
        $conductores = Staff::where('position', 'Mecanico')->get();
        // dd($conductores);
    	

    	
        return view('mantenimiento.buses.register', [
        	'conductores' => $conductores,
        ]);
    }

    public function createBus(Request $request)
    {
        $estado = $request->get('estado');
        // dd($request->get('conductor'));      
        if ($request->get('conductor') == 0) {
            $conductor= null;
        }
        else {
            $conductor = $request->get('conductor');
        }

        // SI ESTA INACTIVO
        if ($estado) {
            $bus = Buses::create([
            'id_bus' => $request->get('id_bus'),
            'modelo' => $request->get('modelo'), 
            'kilometraje'=> $request->get('kilometraje'),
            'conductor_id' =>  $conductor,
            'estado' => 'Inactivo',
            'motivo_inactividad' => $request->get('motivo_inactividad'),
            'fecha_inactivo' => $request->get('fecha_inactivo'),
            'observacion' => $request->get('observacion'),  
           ]);
            
            $success = true;
            if ($success) {
                Session::flash('status','Success');

            }
            
            return redirect('/mantenimiento');
            

        }else {
            $bus = Buses::create([
            'id_bus' => $request->get('id_bus'),
            'modelo' => $request->get('modelo'),
            'kilometraje'=> $request->get('kilometraje'),
            'conductor_id' =>  $conductor,
            'estado' => 'Activo',
           ]);

            $success = true;
            if ($success) {
                Session::flash('status','Nueva Unidad agregada');

            }
            return redirect('/mantenimiento');


        }
    }

    public function showBuses()
    {
        $buses = Buses::all();
        $buses->load('staff');
        // dd($buses);

        return view('mantenimiento.buses.show', [
            'buses' => $buses,
        ]);
    }
}

