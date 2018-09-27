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
    	$conductor = $request->get('conductor');
    	dd($conductor);
    }
}
