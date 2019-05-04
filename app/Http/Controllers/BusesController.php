<?php

namespace App\Http\Controllers;

// use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Buses;
use App\Staff;
use Barryvdh\DomPDF\Facade as PDF;


class BusesController extends Controller
{
    public function showBusForm()
    {
        
        $conductores = Staff::where('position', 'Conductor')->get();
        // dd($conductores);
    	

    	
        return view('mantenimiento.buses.register', [
        	'conductores' => $conductores,
        ]);
    }

    public function createBus(Request $request)
    {
        $estado = $request->get('estado');
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
            'esOperaciones' => $request->get('esOperaciones'),
            'conductor_id' =>  $conductor,
            'estado' => 'Inactivo',
            'motivo_inactividad' => $request->get('motivo_inactividad'),
            'fecha_inactivo' => $request->get('fecha_inactivo'),
            'observacion' => $request->get('observacion'),  
           ]);
            
            $success = true;
            if ($success) {
                Session::flash('status','Nueva Unidad agregada');

            }
            
            return redirect('/mantenimiento');
            

        }else {
            $bus = Buses::create([
            'id_bus' => $request->get('id_bus'),
            'modelo' => $request->get('modelo'),
            'kilometraje'=> $request->get('kilometraje'),
            'esOperaciones' => $request->get('esOperaciones'),

            'conductor_id' =>  $conductor,
            'estado' => 'Activo',
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
        ]);
    }
    public function editBus($id, Request $request)
    {
        $bus = Buses::find($id);
        $estado = $request->get('estado');
        // dd($request->get('conductor'));      
        if ($request->get('conductor') == 0) {
            $conductor= null;
        }
        else {
            $conductor = $request->get('conductor');
        }

        // SI ESTA INACTIVO
        if ($estado) {
            $bus->id_bus = $request->get('id_bus');
            $bus->modelo = $request->get('modelo'); 
            // $bus->kilometraje = $request->get('kilometraje');
            $bus->esOperaciones = $request->get('esOperaciones');
            $bus->conductor_id =  $conductor;
            $bus->estado = 'Inactivo';
            $bus->motivo_inactividad =  $request->get('motivo_inactividad');
            $bus->fecha_inactivo =  $request->get('fecha_inactivo');
            $bus->observacion =  $request->get('observacion');  
        
            $bus->save();
            $success = true;
            if ($success) {
                Session::flash('status','Unidad editada');

            }
            
            return redirect('/mantenimiento');
            

        }else {
            $bus->id_bus = $request->get('id_bus');
            $bus->modelo = $request->get('modelo'); 
            // $bus->kilometraje = $request->get('kilometraje');
            $bus->conductor_id =  $conductor;
            $bus->estado = 'Activo';
            $bus->motivo_inactividad =  null;
            $bus->fecha_inactivo =  null;
            $bus->observacion =  null;  
        
            $bus->save();
            $success = true;
            if ($success) {
                Session::flash('status','Unidad modificacda');

            }
            return redirect('/mantenimiento');


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
            ]);
        }if ($opcion == 2) {
        
            return view('mantenimiento.buses.pdf.conoNorte', [
                'opcion' => $opcion,
            ]);
        }if ($opcion == 3) {
        
            return view('mantenimiento.buses.pdf.conoSur', [
                'opcion' => $opcion,
            ]);
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
                
            }

            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            
            $arr = ['option'=> 1, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('letter', 'landscape');
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
                
                
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('letter', 'landscape');
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
                
                
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('letter', 'landscape');
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
                
                
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('letter', 'landscape');
            return $pdf->stream('PDF Unidades a desincorporar BusPortuguesa.pdf');	
        
        } 
        // buses 6118
         elseif ($request->option == 5) {
             if ($request->q == 1) {
                $Buses = Buses::where('modelo', '6118')->get();
                
            }
            elseif ($request->q == 2) {
                $Buses = Buses::where('esOperaciones', 'Cono Norte')
                                ->where('modelo', '6118')->get();
                
            }
            elseif ($request->q == 3) {
                $Buses = Buses::where('esOperaciones', 'Cono Sur')
                              ->where('modelo', '6118')->get();
                
                
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('letter', 'landscape');
            return $pdf->stream('PDF Unidad 6118 BusPortuguesa.pdf');	
        
        }
        elseif ($request->option == 6) {
            if ($request->q == 1) {
                $Buses = Buses::where('modelo', '6896')->get();
                
            }
            elseif ($request->q == 2) {
                $Buses = Buses::where('esOperaciones', 'Cono Norte')
                                ->where('modelo', '6896')->get();
                
            }
            elseif ($request->q == 3) {
                $Buses = Buses::where('esOperaciones', 'Cono Sur')
                              ->where('modelo', '6896')->get();
                
                
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            $arr = ['option'=> $request->option, 'Buses' => $Buses, 'TotalNorteSur'=> $request->q];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('letter', 'landscape');
            return $pdf->stream('PDF Unidad 6896 BusPortuguesa.pdf');	
        
        }
        elseif ($request->option == 7) {
            if ($request->q == 1) {
                $Buses = Buses::where('modelo', '6752')->get();
                
            }
            elseif ($request->q == 2) {
                $Buses = Buses::where('esOperaciones', 'Cono Norte')
                                ->where('modelo', '6752')->get();
                
            }
            elseif ($request->q == 3) {
                $Buses = Buses::where('esOperaciones', 'Cono Sur')
                              ->where('modelo', '6752')->get();
                
                
            }
            // $Buses->load('staffs');
            if (count($Buses) == 0) {
             Session::flash('status','No hay unidades');
              return redirect('/mantenimiento/pdf/buses/opcion?q='.$request->q);  
            }
            $arr = ['option'=> $request->option, 'Buses' => $Buses,];
            $pdf = PDF::loadView('mantenimiento.buses.pdf.reporte.pdfBuses', compact('arr'));
		    $pdf->setPaper('letter', 'landscape');
            return $pdf->stream('PDF Unidad 6752 BusPortuguesa.pdf');	
        
        }   
    }
}


