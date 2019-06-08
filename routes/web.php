<?php

Route::get('/', function () {
    return view('homepage');
});
Route::get('home', function () {
    return redirect('/');
        // {{ return redirect('/') }}

});

URL::forceScheme('https');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Route::get('/home', 'HomeController@index')->name('home')->middleware('admin:,');


// Rutas del Presidente

require_once __DIR__ . '/routes/presidente.php';


// Rutas del Personal

require_once __DIR__ . '/routes/staff.php';


// Rutas del Personal

require_once __DIR__ . '/routes/mantenimiento.php';

// Rutas del Personal

require_once __DIR__ . '/routes/operaciones.php';

require_once __DIR__ . '/routes/almacen.php';




Route::get('hola', function() {
    return view('staff.datatable');
});

