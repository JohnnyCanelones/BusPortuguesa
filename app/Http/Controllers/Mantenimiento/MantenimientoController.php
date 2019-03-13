<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Buses;
use App\Peticion;
use App\PetitionMonitoring;
use App\Mantenimiento;
use App\Staff;




class MantenimientoController extends Controller
{
    public function home()
    {
    	$busesInactivos = count(Buses::where('estado', 'Inactivo')->get());
        $busesADesinconrporar = count(Buses::where('motivo_inactividad', 'a Desincorporar')->get());
        $busesInactivos = $busesInactivos - $busesADesinconrporar;
        

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

    public function serviciosForm(){
        $buses = Buses::all()
                        ->where('estado', 'Activo' and 'Inactivo')
                        ->where('motivo_inactividad','!=', 'a Desincorporar');
        
        $mecanicos = Staff::where('position', 'Mecanico')->get();
        
        return view('mantenimiento.servicios_reparaciones.nuevoServicioForm', [
            'buses' => $buses,
            'mecanicos' => $mecanicos,
        ]);

    }

    public function nuevoServicio(Request $request){
        $bus = Buses::find($request->get('bus_id'));
        // dd($bus);

        $mecanicos = $request->get('mecanicos');

        // dd($mecanicos);
        $mantenimiento = new Mantenimiento();
        $mantenimiento->fecha = $request->get('fecha');
        $mantenimiento->bus_id = $bus->id_bus;
        $mantenimiento->kilometraje = $bus->kilometraje;
        $mantenimiento->tipo_mantenimiento = $request->get('tipo_mantenimiento');
        $mantenimiento->tipo_servicio = $request->get('tipo_servicio');
        $mantenimiento->save();

        foreach ($mecanicos as $mecanico) {
            $mantenimiento->staffs()->attach(Staff::where('id', $mecanico)->first());
            # code...
        }
        Session::flash('status','Servicio Creado');

        return redirect('/mantenimiento');

    }

    public function showCronograma(){
        $mantenimientos = Mantenimiento::orderBy('fecha', 'desc')->paginate(9);
        $mantenimientos->load('staffs');
        // dd($mantenimientos[0]);
        // dd($mantenimientos);
        return view('mantenimiento.servicios_reparaciones.cronograma', [
            'menu' => 1,
            'mantenimientos' => $mantenimientos, 
        ]);
    }

    public function showCronogramaPreventivos(){
        $mantenimientos = Mantenimiento::orderBy('fecha', 'desc')
                                        ->where('tipo_mantenimiento', 'Preventivo')
                                        ->paginate(9);
        $mantenimientos->load('staffs');
        // dd($mantenimientos[0]);
        // dd($mantenimientos);
        return view('mantenimiento.servicios_reparaciones.cronograma', [
            'menu' => 4,
            'mantenimientos' => $mantenimientos, 
        ]);
    }

    public function showCronogramaCorrectivos(){
        $mantenimientos = Mantenimiento::orderBy('fecha', 'desc')
                                        ->where('tipo_mantenimiento', 'Correctivo')
                                        ->paginate(9);
        $mantenimientos->load('staffs');
        // dd($mantenimientos[0]);
        // dd($mantenimientos);
        return view('mantenimiento.servicios_reparaciones.cronograma', [
            'menu' => 5,
            'mantenimientos' => $mantenimientos, 
        ]);
    }

     public function showCronogramaUnidades(){
        $buses = Buses::all();
        // dd($mantenimientos[0]);
        // dd($mantenimientos);
        return view('mantenimiento.servicios_reparaciones.cronogramaUnidad', [
            'buses' => $buses, 
        ]);
    }
    public function showCronogramaUnidad($id){
        $mantenimientos = Mantenimiento::where('bus_id', $id)
                                        ->orderBy('fecha', 'desc')
                                        ->paginate(9);
        $mantenimientos->load('staffs');
        // dd($mantenimientos[0]);
        // dd($mantenimientos);
        return view('mantenimiento.servicios_reparaciones.cronograma', [
            'menu' => 3,
            'mantenimientos' => $mantenimientos, 
        ]);
    }
    public function modalServicioInfo($id){
        $servicio = Mantenimiento::find($id);
        $servicio->load('staffs');

        return $servicio;

    }
}
