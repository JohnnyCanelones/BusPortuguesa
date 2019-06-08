<?php 

Route::group(['middleware' => ['auth', 'mantenimiento:true,']], function() {
  
  Route::get('/mantenimiento', 'MantenimientoController@home');
  
  Route::post('/mantenimiento/buses/nuevo/modelo', 'BusesController@createModeloBus');
  Route::get('/mantenimiento/buses/registro', 'BusesController@showBusForm');
  Route::post('/mantenimiento/buses/registrar', 'BusesController@createBus');
  // 
  Route::get('mantenimiento/show/buses', 'BusesController@showBuses');
  
  Route::get('mantenimiento/bus/{id}', 'BusesController@editBusForm');
  Route::post('mantenimiento/bus/{id}', 'BusesController@editBus');
  
  Route::get('mantenimiento/servicio/bus/{id}', 'BusesController@mantenimientoBus');
  Route::get('mantenimiento/servicios/bus/{id}', 'BusesController@serviciosBus');
  Route::get('mantenimiento/servicio/bus', 'BusesController@servicioBus');
  Route::get('mantenimiento/bus/{id}/pdf', 'BusesController@servicioBusPdf');
  // Route::post('mantenimiento/servicio/bus/{id}', 'BusesController@editBus');
  
  Route::get('mantenimiento/kilometraje/{id}', 'BusesController@editKilometrajeForm');
  Route::post('mantenimiento/kilometraje/{id}', 'BusesController@editKilometraje');
  
  
  Route::get('mantenimiento/productos', 'PeticionMantenimientoAlmacen@productosDisponibles');
  
  Route::get('mantenimiento/peticion/{id}', 'PeticionMantenimientoAlmacen@peticionForm');
  Route::post('mantenimiento/peticion/{id}/created', 'PeticionMantenimientoAlmacen@peticionCreate');
  Route::post('mantenimiento/peticion/especial/{id}', 'PeticionMantenimientoAlmacen@peticionEspecialCreate');
  
  Route::get('mantenimiento/peticiones', 'PeticionMantenimientoAlmacen@peticionesShow');
  
  
  Route::get('mantenimiento/nuevo/servicio', 'MantenimientoController@serviciosForm');
  Route::get('mantenimiento/update/servicio/{id}', 'MantenimientoController@editServicioForm');
  Route::post('mantenimiento/update/servicio/{id}', 'MantenimientoController@updateServicio');
  
  Route::post('mantenimiento/nuevo/servicio', 'MantenimientoController@nuevoServicio');
  Route::post('mantenimiento/servicio', 'MantenimientoController@createServicio');
  
  
  Route::get('mantenimiento/cronograma','MantenimientoController@showCronograma');
  Route::get('mantenimiento/cronograma/preventivos','MantenimientoController@showCronogramaPreventivos');
  Route::get('mantenimiento/cronograma/correctivos','MantenimientoController@showCronogramaCorrectivos');
  
  Route::get('mantenimiento/cronograma/unidades','MantenimientoController@showCronogramaUnidades');
  Route::get('mantenimiento/cronograma/unidad/{id}','MantenimientoController@showCronogramaUnidad');
  
  Route::get('mantenimiento/cronograma/fechas/desde','MantenimientoController@showCronogramaFechas');
  Route::get('mantenimiento/cronograma/fechas','MantenimientoController@showCronogramaFechasPost');
  Route::post('mantenimiento/cronograma/fechas', 'MantenimientoController@showCronogramaFechasPost');
  Route::get('mantenimiento/cronograma/servicio/{id}','MantenimientoController@modalServicioInfo');
  
  Route::get('mantenimiento/cronograma/reporte/','MantenimientoController@showMantenimientosPdf');
  Route::post('mantenimiento/cronograma/reporte/','MantenimientoController@showMantenimientosPdfPost');
  
  Route::get('mantenimiento/pdf/buses', 'BusesController@busesPdf');
  Route::get('mantenimiento/pdf/buses/opcion/', 'BusesController@opcionBusesPdf');
  Route::get('mantenimiento/pdf/buses/show/todos', 'BusesController@showBusesPdf');



});




