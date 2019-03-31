<?php

use Illuminate\Http\Request;
use App\Peticion;
   

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/mantenimiento', function(){
        $peticionFecha = date("Y/m/d", strtotime('-7 days', strtotime(date("Y/m/d"))));
        
        $peticionesEliminadas = Peticion::whereDate('updated_at', '>=', $peticionFecha)
                                        ->where('observacion', 'Transcurrieron 7 días, el lapso de respuesta ha expirado')
                                        ->where('notificacion', 1)->get();
        
        $peticionesAceptadas = Peticion::whereDate('updated_at', '>=', $peticionFecha)
                                        ->where('estado', 'Aprobada')
                                        ->where('notificacion', 1)->get();
                        
        $arr = [];

        foreach ($peticionesEliminadas as $key ) {
                array_push($arr, $key);
        }
         foreach ($peticionesAceptadas as $key ) {
                array_push($arr, $key);
        }      
        
        $arr2 = collect($arr)->sortByDesc('updated_at');
        foreach ($arr2 as $key) {
                # code...
                $key->load('almacen');
        }
        
        // foreach ($arr as $key => $node) {
        //         $timestamps[$key]    = $node[8]; 
        // }
        // array_multisort($timestamps, SORT_DESC, $arr);
        
        $peticiones = [];
        foreach ($arr2 as $key ) {
                # code...
                array_push($peticiones, $key);

        }
        
return [$peticiones, count($peticiones)];

});

Route::post('/mantenimiento/notificacion/delete/{id}', function($id, Request $request){
        $peticion = Peticion::find($id);
        $peticion->timestamps = false;
        $peticion->notificacion = $request->notificacion;
        // dd($peticion);
        $peticion->save();

// return $peticionesEliminadas;

});
