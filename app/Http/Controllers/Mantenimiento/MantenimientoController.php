<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Buses;
use App\Peticion;
use App\PetitionMonitoring;
use App\Mantenimiento;



class MantenimientoController extends Controller
{
    public function home()
    {
    	$busesInactivos = count(Buses::where('estado', 'Inactivo')->get());
        $busesADesinconrporar = count(Buses::where('motivo_inactividad', 'a Desincorporar')->get());
        $busesInactivos = $busesInactivos - $busesADesinconrporar;
        
        $mantenimientos = Mantenimiento::whereDate('fecha', '=', date("d/m/Y"));
        
        dd($mantenimientos);

    	$busesActivos = count(Buses::where('estado', 'Activo')->get());
        $peticionesPendientes = count(Peticion::where('estado', 'Pendiente')->get());
        $ultimasPeticiones = Peticion::latest()->take(3)->get();
        $ultimasPeticiones->load('almacen');

        
        // dd($ultimasPeticiones);
    	
    	return view('mantenimiento.home', [
    		'busesActivos' => $busesActivos,
            'busesInactivos' => $busesInactivos,
            'busesADesincorporar' => $busesADesinconrporar,
            'peticionesPendientes' => $peticionesPendientes,
            'ultimasPeticiones' => $ultimasPeticiones,
    	]);
    }
}
