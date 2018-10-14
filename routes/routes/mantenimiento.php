<?php 

Route::get('/mantenimiento', 'MantenimientoController@home')->middleware(['auth', 'mantenimiento:,']);

Route::get('/mantenimiento/buses/registro', 'BusesController@showBusForm')->middleware(['auth', 'mantenimiento:,']);
Route::post('/mantenimiento/buses/registrar', 'BusesController@createBus')->middleware(['auth', 'mantenimiento:,']);

Route::get('mantenimiento/show/buses', 'BusesController@showBuses');