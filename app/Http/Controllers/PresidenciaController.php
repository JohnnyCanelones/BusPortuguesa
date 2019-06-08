<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffMonitoring;
use App\WarehouseMonitoring;
use App\PetitionMonitoring;
use App\MaintenanceMonitoring;
use App\BusesMonitoring;


class PresidenciaController extends Controller
{
    
    public function home()
    {
        $monitoreosStaff = StaffMonitoring::whereDate('fecha_accion', '=', date('Y/m/d'))->get();
        // $monitoreosStaff = StaffMonitoring::all();
        $monitoreosAlmacen = WarehouseMonitoring::whereDate('fecha_accion', '=', date('Y/m/d'))->get();
        $monitoreosPeticiones = PetitionMonitoring::whereDate('fecha_accion', '=', date('Y/m/d'))->get();
        $monitoreosMantenimiento = MaintenanceMonitoring::whereDate('fecha_accion', '=', date('Y/m/d'))->get();
        
        // dd($monitoreosStaff);
        // $peticionFecha = date("Y-m-d", strtotime($monitoreosStaff[0]->fecha_accion));

        // dd($peticionFecha.' '.date("Y-m-d"));
    	return view('presidencia.home', [
            'staff' => $monitoreosStaff,
            'almacen' => $monitoreosAlmacen,
            'peticiones' => $monitoreosPeticiones,
            'mantenimiento' => $monitoreosMantenimiento,
        ]);
    }

    

    public function showStaffMonitoring()
    {
        $monitoreos = StaffMonitoring::latest('fecha_accion')->get();
        // $monitoreos->load('user');
        // if ($monitoreo->created) {
        //     dd(true);
        // }else {
            // dd($monitoreos[0]->['user']);
        // }
        // dd($monitoreos[0]);
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
        // $monitoreos->load('user');
        // if ($monitoreo->created) {
        //     dd(true);
        // }else {
            // dd($monitoreos[0]->user);
        // }
        $total = count($monitoreos) + count($monitoreos2);
        // dd($total);

        return view('presidencia.monitoreo.warehouse', [
            'monitoreos' => $monitoreos,
            'monitoreos2' => $monitoreos2,
            'contador_de_monitoreos' => $total
        ]);
    }

    public function showMaintenanceMonitoring()
    {
        $monitoreos = MaintenanceMonitoring::latest('fecha_accion')->get();
        $monitoreos2 = BusesMonitoring::latest('fecha_accion')->get();
        $monitoreos->load('user');

        $total = count($monitoreos) + count($monitoreos2);
        // dd($total);

        return view('presidencia.monitoreo.maintenance', [
            'monitoreos' => $monitoreos,
            'monitoreos2' => $monitoreos2,
            'contador_de_monitoreos' => $total
        ]);
    }

    
}
