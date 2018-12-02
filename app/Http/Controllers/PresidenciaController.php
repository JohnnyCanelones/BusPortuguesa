<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffMonitoring;


class PresidenciaController extends Controller
{
    public function home()
    {
    	return view('presidencia.home');
    }

    public function showStaffMonitoring()
    {
    	$monitoreos = StaffMonitoring::latest('fecha_accion')->get();
        // $monitoreos->load('user);
        // if ($monitoreo->created) {
        //     dd(true);
        // }else {
            // dd($monitoreos[0]->['user']);
        // }

        return view('presidencia.monitoreo.staff', [
        	'monitoreos' => $monitoreos,
        	'contador_de_monitoreos' => 1
        ]);
    }
}
