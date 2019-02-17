<?php 

Route::get('/mantenimiento', 'MantenimientoController@home')->middleware(['auth', 'mantenimiento:,']);

Route::get('/mantenimiento/buses/registro', 'BusesController@showBusForm')->middleware(['auth', 'mantenimiento:,']);
Route::post('/mantenimiento/buses/registrar', 'BusesController@createBus')->middleware(['auth', 'mantenimiento:,']);

Route::get('mantenimiento/show/buses', 'BusesController@showBuses');

Route::get('mantenimiento/productos', 'PeticionMantenimientoAlmacen@productosDisponibles');

Route::get('mantenimiento/peticion/{id}', 'PeticionMantenimientoAlmacen@peticionForm');
Route::post('mantenimiento/peticion/{id}/created', 'PeticionMantenimientoAlmacen@peticionCreate');
Route::post('mantenimiento/peticion/especial/{id}', 'PeticionMantenimientoAlmacen@peticionEspecialCreate');

Route::get('mantenimiento/peticiones', 'PeticionMantenimientoAlmacen@peticionesShow');



