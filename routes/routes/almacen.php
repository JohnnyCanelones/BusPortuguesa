<?php 
	use App\Peticion;
	use Illuminate\Support\Facades\Session;


// Route::get('/almacen', function() {
//     return view('almacen.home');
// })->middleware(['auth', 'almacen:,']);

Route::get('/almacen','AlmacenController@home');
// ->middleware(['auth', 'almacen:,']);

Route::get('/almacen/registro/producto', 'AlmacenController@showProductoForm');
Route::post('/almacen/producto/registrar', 'AlmacenController@createProducto');

Route::get('/almacen/productos', 'AlmacenController@showProductos');
Route::get('/almacen/productos/pdf', 'AlmacenController@showProductosPdf')->name('products.pdf');

Route::get('/almacen/producto/{id}', 'AlmacenController@editProducto');
Route::post('/almacen/producto/update/{id}', 'AlmacenController@updateProducto');

Route::get('almacen/peticiones', 'PeticionMantenimientoAlmacen@peticionesShowAlmacen');
Route::get('almacen/aceptar/peticion/{id}', 'PeticionMantenimientoAlmacen@aceptarPeticion');
Route::get('almacen/rechazar/peticion/{id}', 'PeticionMantenimientoAlmacen@rechazarPeticionForm');
Route::post('almacen/peticion/rechazada/{id}', 'PeticionMantenimientoAlmacen@rechazarPeticion');

Route::get('/almacen/peticiones/pendientes', function() {
	// peticion ajax para recargar si hay una nueva peticion
	$peticionesPendientes = Peticion::where('estado', 'Pendiente')->get();
	$peticionesPendientes->load('almacen');
	return $peticionesPendientes;
});

Route::get('/almacen/peticiones/eliminar', function() {
    $peticionesPendientes = Peticion::where('estado', 'Pendiente')->get();
        $peticionesPendientes->load('almacen');
        
        $peticionesEliminadas = [];

        foreach ($peticionesPendientes as $peticion) {
            
            $peticionFecha = date("Y/m/d", strtotime('+7 days', strtotime($peticion->created_at)));
        
            // dd($peticionFecha);    
            $hoy = date("Y/m/d");
            if ($peticionFecha < $hoy) {
                Session::flash('peticionesEliminadas', 'hecholdasd');
                // Session::flash('hola', 'warning');

                
                array_push($peticionesEliminadas, $peticion);

                $peticion->estado = 'Rechazada';
                $peticion->observacion = 'Transcurrieron 7 días, el lapso de respuesta ha expirado';
                $peticion->save();
            }   
        }
    $peticionesPendientes = count(Peticion::where('estado', 'Pendiente')->get());
    return $peticionesPendientes;
});

Route::get('/almacen/ultimas/peticiones', function() {
	// peticion ajax para recargar si hay una nueva peticion y traer las ultimas 3
	$ultimasPeticiones = Peticion::where('estado', 'Pendiente')->latest()->take(3)->get();
    $ultimasPeticiones->load('almacen');
	return $ultimasPeticiones;
});

Route::get('/almacen/inventario/{id}', 'AlmacenController@editInventario');
Route::post('/almacen/inventario/{id}', 'AlmacenController@updateInventario');
