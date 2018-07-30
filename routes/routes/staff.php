<?php 

Route::get('/personal', function() {
    return view('home');
})->middleware(['auth', 'personal:,']);

Route::get('personal/registro', 'StaffController@showStaffForm')->middleware(['auth', 'personal:,']);
Route::post('personal/registrar', 'StaffController@staffCreate')->middleware(['auth', 'personal:,']);

Route::get('personal/show', 'StaffController@showStaff')->middleware(['auth', 'personal:,']);

//Modificar rol
Route::get('personal/role/{id}', 'StaffController@showRole')->middleware(['auth', 'personal:,']);
Route::post('personal/role/edit/{id}', 'StaffController@roleEdit')->middleware(['auth', 'personal:,']);

//Agregar Rol