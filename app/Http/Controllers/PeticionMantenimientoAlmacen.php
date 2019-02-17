<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Almacen;
use App\Buses;
use App\Peticion;
use App\PetitionMonitoring;
use App\PeticionesEspeciales;



class PeticionMantenimientoAlmacen extends Controller
{

   
   
    public function productosDisponibles()
    {
    	$productos = Almacen::where('cantidad', '>', 0)->get();
		
		// dd($productos);

    	return view('mantenimiento.peticiones.showProductos', [
    		'productos' => $productos,
    	]);  
    
    }

    public function peticionForm($id)
    {
    	$producto = Almacen::where('id', $id)->first();
    	
    	if ($producto->compatibilidad == "Todas las Unidades") {
    		$buses = Buses::all();
    	}else {
    		$buses = Buses::where('modelo', $producto->compatibilidad)->get();
    		
    	}
    	
    
    	return view('mantenimiento.peticiones.peticionForm', [
    		'producto' => $producto,
    		'buses' => $buses,
    	]);  
    }

    public function peticionCreate($id, Request $request)
    {
        $producto = Almacen::where('id', $id)->first();
        $bus_id = $request->get('bus_id');
        $almacen_id = $producto->id;
        $cantidad = $request->get('cantidad');
        
        $contadorProductosTotales = $cantidad;

       
        
        $mesActual = date("m");

        if($mesActual <= 06){
            
            $peticionesAnteriones = Peticion::where('bus_id', $bus_id)
                                        ->where('almacen_id', $almacen_id)
                                        ->whereMonth('created_at', '>=', 01)
                                        ->whereMonth('created_at', '<=', 06)
                                        ->whereYear('created_at', '=', date('Y'))
                                        ->get();


        
            foreach ($peticionesAnteriones as $peticion){
                $contadorProductosTotales = $contadorProductosTotales + $peticion->cantidad;
            }
           
            // dd($contadorProductosTotales);
            if($contadorProductosTotales > $producto->limite  ){
                // dd('Error, solo puedes pedir '.$producto->limite.' unidades de '.$producto->nombre_producto.' hasta junio de este año, ya llevas '.$contadorProductosTotales);
                Session::flash('peticionEspecial', 'Solo puedes pedir '.$producto->limite.' unidades de '.$producto->nombre_producto.
                                ' hasta junio de este año, ya llevas '.$contadorProductosTotales.', dinos el motivo  ');

                return view('mantenimiento/peticiones/peticionEspecial', [
                    'producto' => $producto,
                    'bus_id' => $request->get('bus_id'),
                    'cantidad' => $request->get('cantidad'),
                    // 'observacion' => $request->get('observacion'),
                    // 'estado' => 'Pendiente'
                ]);
                
            }else{
                $peticion = Peticion::create([
                    'almacen_id' => $producto->id,
                    'bus_id' => $request->get('bus_id'),
                    'cantidad' => $request->get('cantidad'),
                    // 'observacion' => $request->get('observacion'),
                    'estado' => 'Pendiente',
                ]);
        
                $monitoreo = PetitionMonitoring::create([
                    'user_id' => Auth::user()->username,
                    'peticion_id' => $peticion->id,
                    'accion' => 'Peticion enviada', 
                    'fecha_accion' => date("Y-m-d H:i:s"),
                ]);
        
                $success = true;
                if ($success) {
                    Session::flash('status','Petición Enviada');
        
                }
            
                    
                return redirect('/mantenimiento');
        
                // dd('#VamosBien, ya llevas '.$contadorProductosTotales);

            }
        
            

              
        }
        
    }

    public function peticionEspecialCreate($id, Request $request)
    {
    	$producto = Almacen::where('id', $id)->first();
       
        $peticion = Peticion::create([
            'almacen_id' => $producto->id,
            'bus_id' => $request->get('bus_id'),
            'cantidad' => $request->get('cantidad'),
            // 'observacion' => $request->get('observacion'),
            'estado' => 'Pendiente',
            'peticion_especial' => 1,
        ]);

        $peticionEspecial = PeticionesEspeciales::create([
            'peticion_id' => $peticion->id,
            'observacion' => $request->get('observacion'),
        ]);

        $monitoreo = PetitionMonitoring::create([
            'user_id' => Auth::user()->username,
            'peticion_id' => $peticion->id,
            'accion' => 'Peticion Especial enviada', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

        $success = true;
        if ($success) {
            Session::flash('status','Petición Especial Enviada');

        }
    
            
        return redirect('/mantenimiento');
 
    }

    public function peticionesShow()
    {
        
    	$peticiones = Peticion::all();
    	$peticiones->load('almacen');
    	// dd($peticiones);
    	foreach ($peticiones as $peticion) {
    		// dd($peticion->almacen->nombre_producto, $peticion->almacen->cantidad);
    		
    	}
    	
    	return view('mantenimiento.peticiones.showPeticiones', [
    		'peticiones' => $peticiones,

    	]);
    }

    public function peticionesShowAlmacen()
    {
        $peticionesPendientes = Peticion::where('estado', 'Pendiente')->get();
        $peticionesPendientes->load('almacen');
        
        $peticionesEliminadas = [];
        foreach ($peticionesPendientes as $peticion) {
            
            $peticionFecha = date("d/m/Y", strtotime('+8 days', strtotime($peticion->created_at)));
            
            $hoy = date("d/m/Y");
            if ($peticionFecha < $hoy) {
                Session::flash('peticionesEliminadas', 'hecholdasd');
                // Session::flash('hola', 'warning');
                array_push($peticionesEliminadas, $peticion);
                
                $peticion->estado = 'Rechazada';
                $peticion->observacion = 'Transcurrieron 5 días, el lapso de respuesta ha expirado';
                $peticion->save();
            }
            
        } 
        $peticiones = Peticion::all();
        $peticiones->load('almacen');

        // foreach ($peticiones as $peticionPendiente) {
        //     $peticionPendiente->isDirty('estado');
        //     // dd($peticionPendiente->isDirty('estado'));
        // }

        $peticionesPendientesNormales = Peticion::where('peticion_especial', 0)
                                        ->where('estado', 'Pendiente')->get();
        $peticionesPendientesNormales->load('almacen');
        
        $peticionesPendientesEspeciales = PeticionesEspeciales::all();
        $peticionesPendientesEspeciales->load('peticion');
        $peticionesEspeciales = [];

        for ($i=0; $i < count($peticionesPendientesEspeciales) ; $i++) { 
            if ($peticionesPendientesEspeciales[$i]->peticion->estado == "Pendiente") {
                array_push($peticionesEspeciales, $peticionesPendientesEspeciales[$i]);
            }
        }
        
        
        // dd($peticionesPendientesNormales);

        $peticiones = Peticion::where('estado','!=', 'Pendiente')->get();
        $peticiones->load('almacen');
        
        return view('almacen.peticiones.showPeticiones', [
            'peticiones' => $peticiones,
            'peticionesPendientes' => $peticionesPendientesNormales,
            'peticionesEspeciales' => $peticionesEspeciales,
            // 'ultimasPeticiones' => $ultimasPeticiones,
            'peticionesEliminadas' => $peticionesEliminadas,
            
        ]);
    }

    public function aceptarPeticion($id)
    {
        $peticion= Peticion::find($id);
        $producto = Almacen::find($peticion->almacen_id);
        
        
        if ($producto->cantidad >= $peticion->cantidad){
            $peticion->estado = 'Aprobada';
            $producto->cantidad = $producto->cantidad - $peticion->cantidad;
            $peticion->save();
            $producto->save();

        }else {
           
            Session::flash('error','No hay Suficientes productos de '. $producto->nombre_producto );
    
         
            return redirect('/almacen/peticiones');

        }
        
        
        $monitoreo = PetitionMonitoring::create([
            'user_id' => Auth::user()->username,
            'peticion_id' => $peticion->id,
            'accion' => 'Peticion aceptada', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

        $success = true;
        if ($success) {
            Session::flash('success','Haz aceptado la Peticion');

        }

        return redirect('/almacen/peticiones');
    }
    
    public function rechazarPeticionForm($id)
    {

        $peticion= Peticion::find($id);
        $peticion->load(['almacen', 'buses']);
        
        // dd($peticion);
        return view('almacen.peticiones.rechazarPeticion', [
            'peticion' => $peticion,
        ]);
    }
    

    public function rechazarPeticion($id, Request $request  )
    {
        $validatedData = $request->validate([
        'observacion' => 'required',

        'observacion.required'  => 'Este campo es Requerido',
        ]);
        $peticion= Peticion::find($id);
        // $peticion->load('almacen');
        $peticion->estado = 'Rechazada';
        $peticion->observacion = $request->get('observacion');
        $peticion->save();

        $monitoreo = PetitionMonitoring::create([
            'user_id' => Auth::user()->username,
            'peticion_id' => $peticion->id,
            'accion' => 'Peticion rechazada', 
            'fecha_accion' => date("Y-m-d H:i:s"),
        ]);

       

        return redirect('/almacen/peticiones')->with([
            'success' => 'Haz rechazado la Peticion',
            // 'nombre_producto' => $peticion->almacen->nombre_producto,
        ]);
    }
    

}
