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
        $peticionFecha = date("Y/m/d", strtotime('-21 days', strtotime(date("Y/m/d"))));
        $peticionesEliminadas = Peticion::whereDate('updated_at', '>=', $peticionFecha)
                                        ->where('observacion', 'Transcurrieron 7 días, el lapso de respuesta ha expirado')->get();
                        

        $peticionesEliminadas->load('almacen');

return $peticionesEliminadas;

});
