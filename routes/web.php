<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('admin:,');


// Rutas del Presidente

require_once __DIR__ . '/routes/presidente.php';


// Rutas del Personal

require_once __DIR__ . '/routes/staff.php';


// Rutas del Personal

require_once __DIR__ . '/routes/mantenimiento.php';

// Rutas del Personal

require_once __DIR__ . '/routes/operaciones.php';






