<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Almacen;
use App\Buses;


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


}
