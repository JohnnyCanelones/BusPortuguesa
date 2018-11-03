<?php 

// Route::get('/almacen', function() {
//     return view('almacen.home');
// })->middleware(['auth', 'almacen:,']);

Route::get('/almacen','AlmacenController@home')->middleware(['auth', 'almacen:,']);

Route::get('/almacen/registro/producto', 'AlmacenController@showProductoForm');
Route::post('/almacen/producto/registrar', 'AlmacenController@createProducto');

Route::get('/almacen/productos', 'AlmacenController@showProductos');
Route::get('/almacen/productos/pdf', 'AlmacenController@showProductosPdf')->name('products.pdf');

Route::get('/almacen/producto/{id}', 'AlmacenController@editProducto');
Route::post('/almacen/producto/update/{id}', 'AlmacenController@updateProducto');

Route::get('almacen/peticiones', 'PeticionMantenimientoAlmacen@peticionesShowAlmacen');
Route::get('almacen/aceptar/peticion/{id}', 'PeticionMantenimientoAlmacen@aceptarPeticion');
Route::get('almacen/rechazar/peticion/{id}', 'PeticionMantenimientoAlmacen@rechazarPeticionForm');
Route::post('almacen/peticion/rechazada/{id}', 'PeticionMantenimientoAlmacen@rechazarPeticion');

