<?php 

Route::get('mantenimiento', function() {
    return view('home');
})->middleware(['auth', 'mantenimiento:,']);