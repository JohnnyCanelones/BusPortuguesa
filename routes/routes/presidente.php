<?php 

Route::get('/presidente', function() {
    return view('home');
})->middleware(['auth', 'admin:,']);