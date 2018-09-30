<?php 

Route::get('/almacen', function() {
    return view('almacen.home');
})->middleware(['auth', 'almacen:,']);

Route::get('/almacen/registro/producto', 'AlmacenController@showProductoForm');
Route::post('/almacen/producto/registrar', 'AlmacenController@createProducto');