<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Buses;
use App\Staff;

class BusesController extends Controller
{
    public function showBusForm()
    {
    	$conductores = Staff::where('position', 'Mecanico')->get();

    	
        return view('mantenimiento.buses.register', [
        	'conductores' => $conductores,
        ]);
    }

    public function createBus(Request $request)
    {
        $estado = $request->get('estado');
                 
         

        // SI ESTA INACTIVO
        if ($estado) {
            $bus = Buses::create([
            'id_bus' => $request->get('id_bus'),
            'rutas' => $request->get('rutas'),
            'conductor_id' =>  $request->get('conductor'),
            'estado' => 'Inactivo',
            'motivo_inactividad' => $request->get('motivo_inactividad'),
            'fecha_inactivo' => $request->get('fecha_inactivo'),
            'observacion' => $request->get('observacion'),  
           ]);
            
            return redirect('/almacen');
            

        }else {
            $bus = Buses::create([
            'id_bus' => $request->get('id_bus'),
            'rutas' => $request->get('rutas'),
            'conductor_id' =>  $request->get('conductor'),
            'estado' => 'Activo',
           ]);
            return redirect('/almacen');
            

        }
    }
}
