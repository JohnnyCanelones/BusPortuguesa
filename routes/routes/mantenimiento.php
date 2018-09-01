<?php 

Route::get('/mantenimiento', function() {
    return view('home');
})->middleware(['auth', 'mantenimiento:,']);

Route::get('/mantenimiento/buses/registro', 'BusesController@showBusForm');