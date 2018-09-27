<?php 

Route::get('/mantenimiento', function() {
    return view('mantenimiento.home');
})->middleware(['auth', 'mantenimiento:,']);

Route::get('/mantenimiento/buses/registro', 'BusesController@showBusForm');
Route::post('/mantenimiento/buses/registrar', 'BusesController@createBus');