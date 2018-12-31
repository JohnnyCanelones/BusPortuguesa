<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffMonitoring;
use App\WarehouseMonitoring;
use App\PetitionMonitoring;


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
        	'monitoreos2' => $monitoreos,
        	'contador_de_monitoreos' => 1
        ]);
    }

    public function showWarehouseMonitoring()
    {
        $monitoreos = WarehouseMonitoring::latest('fecha_accion')->get();
        $monitoreos2 = PetitionMonitoring::latest('fecha_accion')->get();
        // $monitoreos->load('user);
        // if ($monitoreo->created) {
        //     dd(true);
        // }else {
            // dd($monitoreos[0]->['user']);
        // }
        $total = count($monitoreos) + count($monitoreos2);
        // dd($total);

        return view('presidencia.monitoreo.warehouse', [
            'monitoreos' => $monitoreos,
            'monitoreos2' => $monitoreos2,
            'contador_de_monitoreos' => $total
        ]);
    }
}
