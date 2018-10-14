<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Buses;


class MantenimientoController extends Controller
{
    public function home()
    {
    	$busesInactivos = count(Buses::where('estado', 'Inactivo')->get());
    	
    	$busesActivos = count(Buses::where('estado', 'Activo')->get());
    	
    	return view('mantenimiento.home', [
    		'busesActivos' => $busesActivos,
    		'busesInactivos' => $busesInactivos,
    	]);
    }
}
