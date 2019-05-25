<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;


use Illuminate\Http\Request;
use App\Buses;
use App\Peticion;
use App\PetitionMonitoring;
use App\Mantenimiento;
use App\Staff;
use App\Servicio;
use Illuminate\Support\Facades\Auth;
use App\MaintenanceMonitoring;



class MantenimientoController extends Controller
{
    public function home()
    {
    	$busesInactivos = count(Buses::where('estado', 'Inactivo')->get());
        $busesADesinconrporar = count(Buses::where('motivo_inactividad', 'a Desincorporar')->get());
        $busesInactivos = $busesInactivos - $busesADesinconrporar;
        
        $mantenimientos = Mantenimiento::whereDate('fecha', '=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')->get();
        // dd($mantenimientos[0]);
                // dd($mantenimientos[0]);
        $mantenimientos->load('staffs');

        $peticionFecha = date("Y/m/d", strtotime('+21 days', strtotime(date("Y/m/d"))));

        

        $peticionesEliminadas = Peticion::whereDate('updated_at', '<=', $peticionFecha)
                                        ->where('observacion', 'Transcurrieron 7 días, el lapso de respuesta ha expirado')->get();

        if(count($mantenimientos) == 1) {
            $contador = 1;
        
        }elseif(count($mantenimientos) == 2) {
            $contador = 2;
        
        }elseif(count($mantenimientos) == 0) {
            $contador = 0;
        
        }else {
            $contador = 3;
        }


    	$busesActivos = count(Buses::where('estado', 'Activo')->get());
        $peticionesPendientes = count(Peticion::where('estado', 'Pendiente')->get());
        $ultimasPeticiones = Peticion::latest()->take(3)->get();
        $ultimasPeticiones->load('almacen');

        
        // dd($peticionesEliminadas);
    	
    	return view('mantenimiento.home', [
            'contador' => $contador,
    		'busesActivos' => $busesActivos,
            'busesInactivos' => $busesInactivos,
            'mantenimientos' => $mantenimientos,
            'busesADesincorporar' => $busesADesinconrporar,
            'peticionesPendientes' => $peticionesPendientes,
            'ultimasPeticiones' => $ultimasPeticiones,
            'peticionesEliminadas' => $peticionesEliminadas,
    	]);
    }

    public function serviciosForm(){
        $buses = Buses::all()
                        ->where('estado', 'Activo' and 'Inactivo')
                        ->where('motivo_inactividad','!=', 'a Desincorporar');
        
        $mecanicos = Staff::where('position', 'Mecanico')->get();

        $servicios = Servicio::all();
        
        return view('mantenimiento.servicios_reparaciones.nuevoServicioForm', [
            'buses' => $buses,
            'mecanicos' => $mecanicos,
            'servicios' => $servicios
        ]);

    }

    public function nuevoServicio(Request $request){
        $bus = Buses::find($request->get('bus_id'));
        // dd($bus);
        
        $mecanicos = $request->get('mecanicos');

         $mantenimientos = Mantenimiento::where('bus_id', $bus->id_bus)
                                        ->whereDate('fecha', '=', $request->get('fecha'))
                                        ->where('tipo_servicio', '=', $request->get('tipo_servicio'))
                                        ->get();
        
        if (count($mantenimientos ) > 0) {
            $mensaje = 'Ya existe una solicitud de '. strtolower($request->get('tipo_servicio')).' para ese día';
            Session::flash('status', $mensaje);

            return redirect('mantenimiento/nuevo/servicio');
        }

        
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
        
        $monitoreo = MaintenanceMonitoring::create([
            'user_id' => Auth::user()->username,
            'mantenimiento_id' => $mantenimiento->id,
            'accion' => 'Mantenimiento creado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);
        
        return redirect('/mantenimiento');

    }


    public function editServicioForm($id) {
        $mantenimiento = Mantenimiento::find($id);
         $buses = Buses::all()
                        ->where('estado', 'Activo' and 'Inactivo')
                        ->where('motivo_inactividad','!=', 'a Desincorporar');
        
        $mecanicos = Staff::where('position', 'Mecanico')->get();
        
        $diff = $mecanicos->diff($mantenimiento->staffs);
        // dd($diff);
        
        $servicios = Servicio::all();
        return view('mantenimiento.servicios_reparaciones.editServicioForm', [
            'mantenimiento' => $mantenimiento,
            'buses' => $buses,
            'mecanicos' => $diff,
            'servicios' => $servicios,
        ]);
    }

    public function updateServicio(Request $request, $id){
        $bus = Buses::find($request->get('bus_id'));
        $mantenimiento = Mantenimiento::find($id);
        
        $mecanicos = Staff::find($request->get('mecanicos'));

        $mantenimientos = Mantenimiento::where('bus_id', $bus->id_bus)
                                        ->where('id', '!=', $mantenimiento->id)
                                        ->whereDate('fecha', '=', $request->get('fecha'))
                                        ->where('tipo_servicio', '=', $request->get('tipo_servicio'))
                                        ->get();
        $hoy = Date('Y-m-d H:i:s');
        // if ($hoy >  $request->get('fecha') and $mantenimiento->fecha == $request->get('fecha')) {
        //     dd('hola');
        // }else {
        //     // dd('chao');
        //     # code...
        // }

        // dd(count($mantenimientos));
        if (count($mantenimientos) > 0) {
            // dd('hola');
            $mensaje = 'Ya existe una solicitud de '. strtolower($request->get('tipo_servicio')).' para ese día';
            Session::flash('status', $mensaje);
            return redirect('mantenimiento/update/servicio/'.$id);
            
        }else {

            // dd($mantenimiento->id);
            if ($mantenimiento->id == $id) {
                $mantenimiento->fecha = $request->get('fecha');
                $mantenimiento->bus_id = $bus->id_bus;
                $mantenimiento->kilometraje = $bus->kilometraje;
                $mantenimiento->tipo_mantenimiento = $request->get('tipo_mantenimiento');
                $mantenimiento->tipo_servicio = $request->get('tipo_servicio');
                $mantenimiento->save();
                $diff = $mecanicos->diff($mantenimiento->staffs);
                if (count($diff) > 0) {
                    foreach ($diff as $mecanico) {
                        // dd($diff);
                        $mantenimiento->staffs()->attach($mecanico);
                        
                    }
                    $diff2 = $mantenimiento->staffs->diff($mecanicos);
                    foreach ($diff2 as $mecanico ) {
                        $mantenimiento->staffs()->detach($mecanico->id);
                        // dd($mantenimiento->staffs);
                    }
                    
                }else {
                    $diff2 = $mantenimiento->staffs->diff($mecanicos);

                    foreach ($diff2 as $mecanico ) {
                         $mantenimiento->staffs()->detach($mecanico->id);
                        // dd($mantenimiento->staffs);
                    }
                    
                }
                Session::flash('status','Servicio modificado');
                $monitoreo = MaintenanceMonitoring::create([
                    'user_id' => Auth::user()->username,
                    'mantenimiento_id' => $mantenimiento->id,
                    'accion' => 'Mantenimiento editado', 
                    'fecha_accion' => date("Y-m-d H:i:s"),
                ]);
                return redirect('/mantenimiento/cronograma');
            
            }else {
                if (count($mantenimientos ) > 0) {
                    $mensaje = 'Ya existe una solicitud de '. strtolower($request->get('tipo_servicio')).' para ese día';
                    Session::flash('status', $mensaje);
        
                    return redirect('mantenimiento/update/servicio'.$id);
                }
                
            }
            
        }


        
        

    }

    public function showCronograma(){

        $mantenimientos = Mantenimiento::whereDate('fecha', '>=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')->paginate(9);
        
        // dd($mantenimientos);
        $mantenimientos->load('staffs');
        // dd($mantenimientos[0]);
        // dd($mantenimientos);
        return view('mantenimiento.servicios_reparaciones.cronograma', [
            'menu' => 1,
            'mantenimientos' => $mantenimientos, 
        ]);
    }

    public function showCronogramaPreventivos(){
        $mantenimientos = Mantenimiento::whereDate('fecha', '>=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')
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
        $mantenimientos = Mantenimiento::whereDate('fecha', '>=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')
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
                                        ->whereDate('fecha', '>=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')
                                        ->paginate(9);
        $mantenimientos->load('staffs');
        // dd($mantenimientos[0]);
        // dd($mantenimientos);
        return view('mantenimiento.servicios_reparaciones.cronograma', [
            'menu' => 3,
            'mantenimientos' => $mantenimientos, 
        ]);
    }
    public function showCronogramaFechas(){
        // $buses = Buses::all();
        // dd($mantenimientos[0]);
        // dd($mantenimientos);
        return view('mantenimiento.servicios_reparaciones.cronogramaFechas', [
            // 'buses' => $buses, 
        ]);
    }

    public function showCronogramaFechasPost(Request $request){
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');

        $mantenimientos = Mantenimiento::whereDate('fecha', '>=', $desde)
                                    ->whereDate('fecha', '<=', $hasta)
                                    ->orderBy('fecha', 'asc')
                                    ->paginate(9);

        // dd($mantenimientos);

        // dd($mantenimientos[0]);
        // dd($mantenimientos);

        // return redirect('mantenimiento/cronograma/fecha')->with([
        //     'menu' => 2,
        //     'mantenimientos' => $mantenimientos, 
        //     'desde' => $desde,
        //     'hasta' => $hasta,
        // ]);
        
        // dd($mantenimientos->links('mantenimiento.servicios_reparaciones.cronograma'));
        return view('mantenimiento.servicios_reparaciones.cronograma', [
            'menu' => 2,
            'mantenimientos' => $mantenimientos, 
            'desde' => $desde,
            'hasta' => $hasta,
        ]);
    }
    public function CronogramaFechas(){

        // dd($menu)
        return view('mantenimiento.servicios_reparaciones.cronograma');
    }
    public function modalServicioInfo($id){
        $servicio = Mantenimiento::find($id);
        $servicio->load('staffs');

        return $servicio;

    }

    public function createServicio(Request $request){
        // dd($request->name);
        $servicio = new Servicio;
        $servicio->name = $request->name;
        $servicio->save();

        return Servicio::all();
    }

    
    public function showMantenimientosPdfPost(Request $request, $menu)
    {
        return redirect('mantenimiento/cronograma/reporte/');
    		
    }
    public function showMantenimientosPdf(Request $request)
    {   
        $mantenimientos = Mantenimiento::whereDate('fecha', '>=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')->get();
        $mantenimientos->load('staffs');
        
        if ($request->desde) {
            $desde  = $request->desde;
            $hasta = $request->hasta;
            $mantenimientos = Mantenimiento::whereDate('fecha', '>=', $desde)
                                        ->whereDate('fecha', '<=', $hasta)
                                        ->orderBy('fecha', 'asc')->get();
            $mantenimientos->load('staffs');
            // dd('hpla');
            $arr = ['menu'=> 2, 'mantenimientos' => $mantenimientos, 'desde' => $request->desde, 'hasta'=> $request->hasta];
            $pdf = PDF::loadView('mantenimiento.reportes.pdfCronogramas', compact('arr'));
		    $pdf->setPaper('letter', 'portrait');
            return $pdf->stream('PDF Mantenimiento '.$request->desde .'---'. $request->hasta.' BusPortuguesa.pdf');	
        
        } elseif ($request->bus_id) {
             $mantenimientos = Mantenimiento::where('bus_id', $request->bus_id )
                                        ->whereDate('fecha', '>=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')
                                        ->get();
            $mantenimientos->load('staffs');
            $arr = ['menu'=> 3, 'mantenimientos' => $mantenimientos, 'bus_id' => $request->bus_id ];
            $pdf = PDF::loadView('mantenimiento.reportes.pdfCronogramas', compact('arr'));
		    $pdf->setPaper('letter', 'portrait');
            return $pdf->stream('PDF Mantenimiento Unidad '. $request->bus_id .' BusPortuguesa '. date("d-m-Y") .'.pdf');	
        
        } elseif ($request->tipo_mantenimiento) {
            $mantenimientos = Mantenimiento::whereDate('fecha', '>=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')
                                        ->where('tipo_mantenimiento', $request->tipo_mantenimiento )
                                        ->get();
            $mantenimientos->load('staffs');
            $arr = ['menu'=> 4, 'mantenimientos' => $mantenimientos, 'tipo_mantenimiento' => $request->tipo_mantenimiento ];
            $pdf = PDF::loadView('mantenimiento.reportes.pdfCronogramas', compact('arr'));
		    $pdf->setPaper('letter', 'portrait');
            return $pdf->stream('PDF Mantenimiento BusPortuguesa '. date("d-m-Y") .'.pdf');	
        } else {
            $mantenimientos = Mantenimiento::whereDate('fecha', '>=', date("Y/m/d"))
                                        ->orderBy('fecha', 'asc')->get();
            $mantenimientos->load('staffs');
            $arr = ['menu'=> 1, 'mantenimientos' => $mantenimientos];
            $pdf = PDF::loadView('mantenimiento.reportes.pdfCronogramas', compact('arr'));
		    $pdf->setPaper('letter', 'portrait');
            return $pdf->stream('PDF Mantenimiento BusPortuguesa '. date("d-m-Y") .'.pdf');	
        
        }
 	
    }
}
