<?php 

Route::get('/mantenimiento', 'MantenimientoController@home')->middleware(['auth', 'mantenimiento:,']);

Route::get('/mantenimiento/buses/registro', 'BusesController@showBusForm')->middleware(['auth', 'mantenimiento:,']);
Route::post('/mantenimiento/buses/registrar', 'BusesController@createBus')->middleware(['auth', 'mantenimiento:,']);

Route::get('mantenimiento/show/buses', 'BusesController@showBuses');

Route::get('mantenimiento/bus/{id}', 'BusesController@editBusForm');
Route::post('mantenimiento/bus/{id}', 'BusesController@editBus');

Route::get('mantenimiento/kilometraje/{id}', 'BusesController@editKilometrajeForm');
Route::post('mantenimiento/kilometraje/{id}', 'BusesController@editKilometraje');


Route::get('mantenimiento/productos', 'PeticionMantenimientoAlmacen@productosDisponibles');

Route::get('mantenimiento/peticion/{id}', 'PeticionMantenimientoAlmacen@peticionForm');
Route::post('mantenimiento/peticion/{id}/created', 'PeticionMantenimientoAlmacen@peticionCreate');
Route::post('mantenimiento/peticion/especial/{id}', 'PeticionMantenimientoAlmacen@peticionEspecialCreate');

Route::get('mantenimiento/peticiones', 'PeticionMantenimientoAlmacen@peticionesShow');

Route::get('mantenimiento/cronograma', function(){
  return view('mantenimiento.servicios_reparaciones.cronograma');
});



