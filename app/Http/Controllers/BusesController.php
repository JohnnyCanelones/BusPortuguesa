<?php

namespace App\Http\Controllers;

// use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Buses;
use App\Staff;
use App\Servicio;

use App\BusesMonitoring;
use App\ModeloBus;
use App\Mantenimiento;
use Barryvdh\DomPDF\Facade as PDF;


class BusesController extends Controller
{
    public function createModeloBus(Request $request) {
        $modelos =  ModeloBus::all();
        foreach ($modelos as $modelo ) {
            if (strtolower($modelo->name) == strtolower($request->get('name'))){
                return 'error';
            } 
        }
        $modelo = ModeloBus::create([
            'name' => $request->get('name'),
        ]);

        return $modelos;
    }
    public function showBusForm()
    {
        $modelos =  ModeloBus::all();
        
        $conductores = Staff::where('position', 'Conductor')->get();
        // dd($conductores);
    	

    	
        return view('mantenimiento.buses.register', [
            'conductores' => $conductores,
            'modelos' =>  ModeloBus::all(),
            
        ]);
    }

    public function createBus(Request $request)
    {
        $estado = $request->get('estado');
        $servicio = $request->get('estado2');
        // dd($request->get('conductor'));      
        if ($request->get('conductor') == 0) {
            $conductor= null;
        }
        else {
            $conductor = $request->get('conductor');
        }

        // SI ESTA INACTIVO
        if ($estado) {
            $bus = Buses::create([
            'id_bus' => $request->get('id_bus'),
            'modelo' => $request->get('modelo'), 
            'kilometraje'=> $request->get('kilometraje'),
            'vin'=> $request->get('vin'),
            'esOperaciones' => $request->get('esOperaciones'),
            'conductor_id' =>  $conductor,
            'estado' => 'Inactivo',
            'motivo_inactividad' => $request->get('motivo_inactividad'),
            'fecha_inactivo' => $request->get('fecha_inactivo'),
            'observacion' => $request->get('observacion'),  
           ]);
           $monitoreo = BusesMonitoring::create([
            'user_id' => Auth::user()->username,
            'bus_id' => $request->get('id_bus'),
            'accion' => 'Bus Creado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
            ]);
            
            $success = true;
            if ($success) {
                Session::flash('status','Nueva Unidad agregada');

            }
            
            return redirect('/mantenimiento');
            

        }else {
            if ($servicio) {
                $bus = Buses::create([
                    'id_bus' => $request->get('id_bus'),
                    'modelo' => $request->get('modelo'),
                    'kilometraje'=> $request->get('kilometraje'),
                    'vin'=> $request->get('vin'),
                    
                    'esOperaciones' => $request->get('esOperaciones'),
                    
                    'conductor_id' =>  $conductor,
                    'estado' => 'Activo',
                    'fecha_inactivo' => $request->get('fecha_inactivo2'),
                    'observacion' => $request->get('observacion2'),  
                    ]);
            

           }else {
               $bus = Buses::create([
                'id_bus' => $request->get('id_bus'),
                'modelo' => $request->get('modelo'),
                'kilometraje'=> $request->get('kilometraje'),
                'vin'=> $request->get('vin'),

                'esOperaciones' => $request->get('esOperaciones'),

                'conductor_id' =>  $conductor,
                'estado' => 'Activo',
                
            ]);
               
           }
            $monitoreo = BusesMonitoring::create([
            'user_id' => Auth::user()->username,
            'bus_id' => $request->get('id_bus'),
            'accion' => 'Bus Creado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
            ]);
            $success = true;
            if ($success) {
                Session::flash('status','Nueva Unidad agregada');

            }
            return redirect('/mantenimiento');


        }
    }

    public function editBusForm($id)
    {
        $bus = Buses::find($id);
        $conductores = Staff::where('position', 'Conductor')->get();
        
        return view('mantenimiento.buses.busEdit', [
            'conductores' => $conductores,
            'bus' => $bus,
            'modelos' =>  ModeloBus::all(),

        ]);
    }
    public function editBus($id, Request $request)
    {
        $bus = Buses::find($id);
        $estado = $request->get('estado');
        $servicio = $request->get('estado2');

        // dd($request->get('conductor'));      
        if ($request->get('conductor') == 0) {
            $conductor= null;
        }
        else {
            $conductor = $request->get('conductor');
        }

        // SI ESTA INACTIVO
        if ($estado) {
            // $bus->id_bus = $request->get('id_bus');
            $bus->modelo = $request->get('modelo'); 
            // $bus->kilometraje = $request->get('kilometraje');
            $bus->esOperaciones = $request->get('esOperaciones');
            $bus->conductor_id =  $conductor;
            $bus->vin = $request->get('vin');

            $bus->estado = 'Inactivo';
            $bus->motivo_inactividad =  $request->get('motivo_inactividad');
            $bus->fecha_inactivo =  $request->get('fecha_inactivo');
            $bus->observacion =  $request->get('observacion');  
        
            $bus->save();
            $monitoreo = BusesMonitoring::create([
            'user_id' => Auth::user()->username,
            'bus_id' => $bus->id_bus,
            'accion' => 'Bus editado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
            ]);
            $success = true;
            if ($success) {
                Session::flash('status','Unidad editada');

            }
            
            return redirect('/mantenimiento/show/buses');
            

        }else {
            
            // $bus->id_bus = $request->get('id_bus');
            $bus->modelo = $request->get('modelo'); 
            // $bus->kilometraje = $request->get('kilometraje');
            $bus->conductor_id =  $conductor;
            $bus->vin = $request->get('vin');

            $bus->estado = 'Activo';
            $bus->motivo_inactividad =  null;
            $bus->fecha_inactivo =  null;
            $bus->observacion =  null;  
            if ($servicio) {
                $bus->fecha_inactivo =  $request->get('fecha_inactivo2');
                $bus->observacion =  $request->get('observacion2');
                // dd($bus);
            }
            $bus->save();
            $monitoreo = BusesMonitoring::create([
            'user_id' => Auth::user()->username,
            'bus_id' => $bus->id_bus,
            'accion' => 'Bus editado', 
            'fecha_accion' => date("Y-m-d H:i:s"),
            ]);
            $success = true;
            if ($success) {
                Session::flash('status','Unidad modificacda');

            }
            return redirect('/mantenimiento/show/buses');


        }
    }

    public function editKilometrajeForm($id)
    {
        $bus = Buses::find($id);
        return view('mantenimiento.buses.kilometrajeEdit', [
            'bus' => $bus,
            'kilometraje' => $bus->kilometraje
        ]);
    }

    public function editKilometraje($id, Request $request)
    {
        $bus = Buses::find($id);
        $nuevoKilometraje =  $request->get('kilometraje');

        if ($nuevoKilometraje <= $bus->kilometraje) {
            
            Session::flash('error','El kilometraje que colocó es menor o igual al que ya estaba guardado');
            
            // return redirect('/mantenimiento/kilometraje/'.$bus->id_bus);

            return view('mantenimiento.buses.kilometrajeEdit', [
                'bus' => $bus,
                'kilometraje' => $nuevoKilometraje,
            ]);
        } else {
            $monitoreo = BusesMonitoring::create([
            'user_id' => Auth::user()->username,
            'bus_id' => $bus->id_bus,
            'accion' => 'Kilometraje editado antes: '. number_format($bus->kilometraje).' Km, ahora: '.number_format($nuevoKilometraje). ' Km', 
            'fecha_accion' => date("Y-m-d H:i:s"),
            ]);
            $bus->kilometraje = $nuevoKilometraje;
            $bus->save();
            Session::flash('status','Modificado el kilometraje');
            
            return redirect('/mantenimiento');
            
        }
        


    }

    public function showBuses()
    {
        $buses = Buses::all();
        $buses->load('staff');
        // dd($buses);

        return view('mantenimiento.buses.show', [
            'buses' => $buses,
        ]);
    }

    public function mantenimientoBus($id) {
        $mantenimientos = Mantenimiento::where('bus_id', $id)->get();
        
        $grouped = $mantenimientos->groupBy('tipo_servicio');
        // dd($grouped);


        return view('mantenimiento.buses.mantenimientosBus', [
            'pagina' => 'mantenimientos',
            'tipo_servicios' => $grouped,
            'mantenimientos' => $mantenimientos,
        ]);
    }

    public function serviciosBus($id) {
        $mantenimientos = Mantenimiento::where('bus_id', $id)->get();
        $mantenimientos->load('buses');
        
        $grouped = $mantenimientos->groupBy('tipo_servicio');
        foreach ($grouped as $key => $value) {
            // dd($value[0]->buses);
            # code...
        }
        
        $arr = ['mantenimientos' => $grouped];
        // dd($arr['mantenimientos'][0]->buses->id_bus);
        $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.busServicios', compact('arr'));
        // $pdf->setPaper('a4', 'portrait');
        $pdf->setPaper([0, 0, 685.98, 496.85], 'portrait');
        return $pdf->stream('PDF BusPortuguesa.pdf');

        return view('mantenimiento.buses.mantenimientosBus', [
            'pagina' => 'mantenimientos',
            'tipo_servicios' => $grouped,
            // 'mantenimientos' => $mantenimientos,
        ]);
    }



    public function servicioBus(Request $request) {
        $mantenimientos = Mantenimiento::where('bus_id', $request->get('bus'))
                                        ->where('tipo_servicio', $request->get('tipo_servicio'))->get();
        // dd($mantenimientos);
         return view('mantenimiento.buses.mantenimientosBus', [
            'pagina' => 'servicio',
            'mantenimientos' => $mantenimientos,
        ]);

        
    }

    public function servicioBusPdf(Request $request, $id) {
        $mantenimientos = Mantenimiento::where('bus_id', $id)
                                        ->whereDate('fecha', '>=', $request->get('desde'))
                                        ->whereDate('fecha', '<=', $request->get('hasta'))
                                        ->where('tipo_servicio', '=', $request->get('tipo_servicio'))
                                        ->get();
                                        
                                        // dd($mantenimientos[0]);
        $arr = ['desde'=> $request->get('desde'), 'hasta' => $request->get('hasta'), 
                'mantenimientos' => $mantenimientos, 'tipo_servicio' => $request->get('tipo_servicio')];
        // dd($arr['mantenimientos'][0]->buses->id_bus);
        $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.busServicioFecha', compact('arr'));
        // $pdf->setPaper('a4', 'portrait');
        $pdf->setPaper([0, 0, 685.98, 496.85], 'portrait');
        return $pdf->stream('PDF BusPortuguesa.pdf');	
    }
    public function busesPdf()
    {
        return view('mantenimiento.buses.pdf.busesPdf');
    }

    public function opcionBusesPdf(Request $request) 
    {
        $opcion = $request->get('q');
        if ($opcion == 1) {
            return view('mantenimiento.buses.pdf.totalBuses', [
                'opcion' => $opcion,
                'modelos' =>  ModeloBus::all(),

            ]);
        }elseif ($opcion == 2) {
        
            return view('mantenimiento.buses.pdf.conoNorte', [
                'opcion' => $opcion,
                'modelos' =>  ModeloBus::all(),

            ]);
        }elseif ($opcion == 3) {
        
            return view('mantenimiento.buses.pdf.conoSur', [
                'opcion' => $opcion,
                'modelos' =>  ModeloBus::all(),

            ]);
        }else{
            Session::flash('status','No hay datos registrados');

            return redirect('/mantenimiento/pdf/buses');  

        }

    }

     public function showBusesPdf(Request $request)
    {   
     
        
        //    todos los buses
        if ($request->option == 1) {
            if ($request->q == 1) {
                $Buses = Buses::all();
                
            }
            elseif ($request->q == 2) {
                $Buses = Buses::where('esOperaciones', 'Cono Norte')->get();
                
            }
            elseif ($request->q == 3) {
                $Buses = Buses::where('esOperaciones', 'Cono Sur')->get();
                
            }else {
                 Session::flash('status','No hay datos registrados');

                return redirect('/mantenimiento/pdf/buses');  
            }

            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            
            $arr = ['option'=> 1, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('PDF Unidades BusPortuguesa.pdf');	
        
        } 
        
        // buses Operativos
        elseif ($request->option == 2) {
            if ($request->q == 1) {
                $Buses = Buses::where('estado', 'Activo')->get();
                
            }
            elseif ($request->q == 2) {
                $Buses = Buses::where('esOperaciones', 'Cono Norte')
                                ->where('estado', 'Activo')->get();
                
            }
            elseif ($request->q == 3) {
                $Buses = Buses::where('esOperaciones', 'Cono Sur')
                              ->where('estado', 'Activo')->get();
                
                
            }else {
                 Session::flash('status','No hay datos registrados');

                return redirect('/mantenimiento/pdf/buses');  
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('PDF Unidades Operativas BusPortuguesa.pdf');	
        
        } 
        
        // buses Inoperativos
         elseif ($request->option == 3) {
           if ($request->q == 1) {
                $Buses = Buses::where('estado', 'Inactivo')->get();
                
            }
            elseif ($request->q == 2) {
                $Buses = Buses::where('esOperaciones', 'Cono Norte')
                                ->where('estado', 'Inactivo')->get();
                
            }
            elseif ($request->q == 3) {
                $Buses = Buses::where('esOperaciones', 'Cono Sur')
                              ->where('estado', 'Inactivo')->get();
                
                
            }else {
                 Session::flash('status','No hay datos registrados');

                return redirect('/mantenimiento/pdf/buses');  
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('PDF Unidades inoperativas BusPortuguesa.pdf');	
        
        } 
        // buses a desincorporar
         elseif ($request->option == 4) {
             if ($request->q == 1) {
                $Buses = Buses::where('motivo_inactividad', 'a Desincorporar')->get();
                
            }
            elseif ($request->q == 2) {
                $Buses = Buses::where('esOperaciones', 'Cono Norte')
                                ->where('motivo_inactividad', 'a Desincorporar')->get();
                
            }
            elseif ($request->q == 3) {
                $Buses = Buses::where('esOperaciones', 'Cono Sur')
                              ->where('motivo_inactividad', 'a Desincorporar')->get();
                
                
            }else {
                 Session::flash('status','No hay datos registrados');

                return redirect('/mantenimiento/pdf/buses');  
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('PDF Unidades a desincorporar BusPortuguesa.pdf');	
        
        } 
        // buses 6118
         elseif ($request->option > 10) {
             if ($request->q == 1) {
                $Buses = Buses::where('modelo', $request->option)->get();
                
            }
            elseif ($request->q == 2) {
                $Buses = Buses::where('esOperaciones', 'Cono Norte')
                                ->where('modelo', $request->option)->get();
                
            }
            elseif ($request->q == 3) {
                $Buses = Buses::where('esOperaciones', 'Cono Sur')
                              ->where('modelo', $request->option)->get();
                
                
            }else {
                 Session::flash('status','No hay datos registrados');

                return redirect('/mantenimiento/pdf/buses');  
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('a4', 'landscape');
            return $pdf->stream('PDF Unidad '.$request->option .' BusPortuguesa.pdf');	
        
        }else {
            Session::flash('status','No hay unidades');
            return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            
        }
        //  elseif ($request->option == 5) {
        //      if ($request->q == 1) {
        //         $Buses = Buses::where('modelo', '6118')->get();
                
        //     }
        //     elseif ($request->q == 2) {
        //         $Buses = Buses::where('esOperaciones', 'Cono Norte')
        //                         ->where('modelo', '6118')->get();
                
        //     }
        //     elseif ($request->q == 3) {
        //         $Buses = Buses::where('esOperaciones', 'Cono Sur')
        //                       ->where('modelo', '6118')->get();
                
                
        //     }
        //     // $Buses->load('staffs');
        //     if (count($Buses) == 0) {
        //      Session::flash('status','No hay unidades');
        //       return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
        //     }
        //     $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
        //     $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		//     $pdf->setPaper('a4', 'landscape');
        //     return $pdf->stream('PDF Unidad 6118 BusPortuguesa.pdf');	
        
        // }
        // elseif ($request->option == 6) {
        //     if ($request->q == 1) {
        //         $Buses = Buses::where('modelo', '6896')->get();
                
        //     }
        //     elseif ($request->q == 2) {
        //         $Buses = Buses::where('esOperaciones', 'Cono Norte')
        //                         ->where('modelo', '6896')->get();
                
        //     }
        //     elseif ($request->q == 3) {
        //         $Buses = Buses::where('esOperaciones', 'Cono Sur')
        //                       ->where('modelo', '6896')->get();
                
                
        //     }
        //     // $Buses->load('staffs');
        //     if (count($Buses) == 0) {
        //      Session::flash('status','No hay unidades');
        //       return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
        //     }
        //     $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
        //     $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		//     $pdf->setPaper('a4', 'landscape');
        //     return $pdf->stream('PDF Unidad 6896 BusPortuguesa.pdf');	
        
        // }
        // elseif ($request->option == 7) {
        //     if ($request->q == 1) {
        //         $Buses = Buses::where('modelo', '6752')->get();
                
        //     }
        //     elseif ($request->q == 2) {
        //         $Buses = Buses::where('esOperaciones', 'Cono Norte')
        //                         ->where('modelo', '6752')->get();
                
        //     }
        //     elseif ($request->q == 3) {
        //         $Buses = Buses::where('esOperaciones', 'Cono Sur')
        //                       ->where('modelo', '6752')->get();
                
                
        //     }
        //     // $Buses->load('staffs');
        //     if (count($Buses) == 0) {
        //      Session::flash('status','No hay unidades');
        //       return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
        //     }
        //     $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
        //     $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		//     $pdf->setPaper('a4', 'landscape');
        //     return $pdf->stream('PDF Unidad 6752 BusPortuguesa.pdf');	
        
        // }   
    }
}


