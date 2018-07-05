<?php 

Route::get('operaciones', function() {
    return view('home');
})->middleware('auth');