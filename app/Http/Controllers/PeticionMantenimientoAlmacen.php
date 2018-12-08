<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Almacen;
use App\Buses;
use App\Peticion;
use App\PetitionMonitoring;



class PeticionMantenimientoAlmacen extends Controller
{

   
   
    public function productosDisponibles()
    {
    	$productos = Almacen::where('cantidad', '>', 0)->get();
		
		// dd($productos);

    	return view('mantenimiento.peticiones.showProductos', [
    		'productos' => $productos,
    	]);  
    
    }

    public function peticionForm($id)
    {
    	$producto = Almacen::where('id', $id)->first();
    	
    	if ($producto->compatibilidad == "Todas las Unidades") {
    		$buses = Buses::all();
    	}else {
    		$buses = Buses::where('modelo', $producto->compatibilidad)->get();
    		
    	}
    	
    
    	return view('mantenimiento.peticiones.peticionForm', [
    		'producto' => $producto,
    		'buses' => $buses,
    	]);  
    }

    public function peticionCreate($id, Request $request)
    {
    	$producto = Almacen::where('id', $id)->first();
    	
    	$peticion = Peticion::create([
    		'almacen_id' => $producto->id,
    		'bus_id' => $request->get('bus_id'),
    		'cantidad' => $request->get('cantidad'),
    		// 'observacion' => $request->get('observacion'),
    		'estado' => 'Pendiente',
    	]);

        $monitoreo = PetitionMonitoring::create([
            'user_id' => Auth::user()->username,
            'peticion_id' => $peticion->id,
            'accion' => 'Peticion enviada', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

    	$success = true;
        if ($success) {
            Session::flash('status','Petición Enviada');

        }
    
            
        return redirect('/mantenimiento');

    }

    public function peticionesShow()
    {
    	$peticiones = Peticion::all();
    	$peticiones->load('almacen');
    	// dd($peticiones);
    	foreach ($peticiones as $peticion) {
    		// dd($peticion->almacen->nombre_producto, $peticion->almacen->cantidad);
    		
    	}
    	
    	return view('mantenimiento.peticiones.showPeticiones', [
    		'peticiones' => $peticiones,
    	]);
    }

    public function peticionesShowAlmacen()
    {
        $peticiones = Peticion::all();
        $peticiones->load('almacen');

        // foreach ($peticiones as $peticionPendiente) {
        //     $peticionPendiente->isDirty('estado');
        //     // dd($peticionPendiente->isDirty('estado'));
        // }

        $peticionesPendientes = Peticion::where('estado', 'Pendiente')->get();
        $peticionesPendientes->load('almacen');
        $peticiones = Peticion::where('estado','!=', 'Pendiente')->get();
        $peticiones->load('almacen');
        
        return view('almacen.peticiones.showPeticiones', [
            'peticiones' => $peticiones,
            'peticionesPendientes' => $peticionesPendientes,
        ]);
    }

    public function aceptarPeticion($id)
    {
        $peticion= Peticion::find($id);
        $producto = Almacen::find($peticion->almacen_id);
        $peticion->estado = 'Aprobada';
        
        $producto->cantidad = $producto->cantidad - $peticion->cantidad;
        
        $peticion->save();
        $producto->save();

        $monitoreo = PetitionMonitoring::create([
            'user_id' => Auth::user()->username,
            'peticion_id' => $peticion->id,
            'accion' => 'Peticion aceptada', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

        $success = true;
        if ($success) {
            Session::flash('success','Haz aceptado la Peticion');

        }

        return redirect('/almacen/peticiones');
    }
    
    public function rechazarPeticionForm($id)
    {

        $peticion= Peticion::find($id);
        $peticion->load(['almacen', 'buses']);
        
        // dd($peticion);
        return view('almacen.peticiones.rechazarPeticion', [
            'peticion' => $peticion,
        ]);
    }
    

    public function rechazarPeticion($id, Request $request  )
    {
        $validatedData = $request->validate([
        'observacion' => 'required',

        'observacion.required'  => 'Este campo es Requerido',
        ]);
        $peticion= Peticion::find($id);
        // $peticion->load('almacen');
        $peticion->estado = 'Rechazada';
        $peticion->observacion = $request->get('observacion');
        $peticion->save();

        $monitoreo = PetitionMonitoring::create([
            'user_id' => Auth::user()->username,
            'peticion_id' => $peticion->id,
            'accion' => 'Peticion rechazada', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

       

        return redirect('/almacen/peticiones')->with([
            'success' => 'Haz rechazado la Peticion',
            // 'nombre_producto' => $peticion->almacen->nombre_producto,
        ]);
    }
    

}
