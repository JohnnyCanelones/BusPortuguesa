<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Almacen;
use App\Buses;
use App\Peticion;


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
    		'observacion' => $request->get('observacion'),
    		'estado' => 'Pendiente',
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


}
