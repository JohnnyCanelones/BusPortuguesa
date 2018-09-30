<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function showProductoForm()
    {
    	return view('almacen.productos.nuevoProducto');	
    }
}
