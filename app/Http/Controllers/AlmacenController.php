<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Almacen;

class AlmacenController extends Controller
{
    public function showProductoForm()
    {
    	return view('almacen.productos.nuevoProducto');	
    }

    public function createProducto(Request $request)
    {
    	$producto = Almacen::create([
    		'nombre_producto' => $request->get('nombre_producto'),
    		'compatibilidad' => $request->get('compatibilidad'),
    		'cantidad' => $request->get('cantidad'),
    		'ubicacion' => $request->get('ubicacion'),
    	]);


    	$success = true;
        if ($success) {
            Session::flash('status','Success');

        }
            
        return redirect('/almacen');
    }

    public function showProductos()
    {
    	$productos = Almacen::all(); 

    	return view('almacen.productos.showProductos', [
    		'productos' => $productos,
    	]);   
    }
}
