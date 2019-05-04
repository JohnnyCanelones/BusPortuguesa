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
        
        $conductores = Staff::where('position', 'Conductor')->get();
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
            'esOperaciones' => $request->get('esOperaciones'),
            'conductor_id' =>  $conductor,
            'estado' => 'Inactivo',
            'motivo_inactividad' => $request->get('motivo_inactividad'),
            'fecha_inactivo' => $request->get('fecha_inactivo'),
            'observacion' => $request->get('observacion'),  
           ]);
            
            $success = true;
            if ($success) {
                Session::flash('status','Nueva Unidad agregada');

            }
            
            return redirect('/mantenimiento');
            

        }else {
            $bus = Buses::create([
            'id_bus' => $request->get('id_bus'),
            'modelo' => $request->get('modelo'),
            'kilometraje'=> $request->get('kilometraje'),
            'esOperaciones' => $request->get('esOperaciones'),

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

    public function editBusForm($id)
    {
        $bus = Buses::find($id);
        $conductores = Staff::where('position', 'Mecanico')->get();
    
        return view('mantenimiento.buses.busEdit', [
            'conductores' => $conductores,
            'bus' => $bus,
        ]);
    }
    public function editBus($id, Request $request)
    {
        $bus = Buses::find($id);
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
            $bus->id_bus = $request->get('id_bus');
            $bus->modelo = $request->get('modelo'); 
            // $bus->kilometraje = $request->get('kilometraje');
            $bus->esOperaciones = $request->get('esOperaciones');
            $bus->conductor_id =  $conductor;
            $bus->estado = 'Inactivo';
            $bus->motivo_inactividad =  $request->get('motivo_inactividad');
            $bus->fecha_inactivo =  $request->get('fecha_inactivo');
            $bus->observacion =  $request->get('observacion');  
        
            $bus->save();
            $success = true;
            if ($success) {
                Session::flash('status','Unidad editada');

            }
            
            return redirect('/mantenimiento');
            

        }else {
            $bus->id_bus = $request->get('id_bus');
            $bus->modelo = $request->get('modelo'); 
            // $bus->kilometraje = $request->get('kilometraje');
            $bus->conductor_id =  $conductor;
            $bus->estado = 'Activo';
            $bus->motivo_inactividad =  null;
            $bus->fecha_inactivo =  null;
            $bus->observacion =  null;  
        
            $bus->save();
            $success = true;
            if ($success) {
                Session::flash('status','Unidad modificacda');

            }
            return redirect('/mantenimiento');


        }
    }

    public function editKilometrajeForm($id)
    {
        $bus = Buses::find($id);
        return view('mantenimiento.buses.kilometrajeEdit', [
            'bus' => $bus,
            'kilometraje' => $bus->kilometraje
        ]);
    }

    public function editKilometraje($id, Request $request)
    {
        $bus = Buses::find($id);
        $nuevoKilometraje =  $request->get('kilometraje');

        if ($nuevoKilometraje <= $bus->kilometraje) {
            
            Session::flash('error','El kilometraje que colocó es menor o igual al que ya estaba guardado');
            
            // return redirect('/mantenimiento/kilometraje/'.$bus->id_bus);

            return view('mantenimiento.buses.kilometrajeEdit', [
                'bus' => $bus,
                'kilometraje' => $nuevoKilometraje,
            ]);
        } else {
            $bus->kilometraje = $nuevoKilometraje;
            $bus->save();
            Session::flash('status','Modificado el kilometraje');
            
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

