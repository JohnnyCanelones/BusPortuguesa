<?php 

Route::get('/personal', 'StaffController@staffHome')->middleware(['auth', 'personal:,']);

Route::get('personal/registro', 'StaffController@showStaffForm')->middleware(['auth', 'personal:,']);
Route::post('personal/registrar', 'StaffController@staffCreate')->middleware(['auth', 'personal:,']);

Route::get('personal/show', 'StaffController@showStaff')->middleware(['auth', 'personal:,']);

//Modificar rol
Route::get('personal/role/{id}', 'StaffController@showRole')->middleware(['auth', 'personal:,']);
Route::post('personal/role/update/{id}', 'StaffController@roleEdit')->middleware(['auth', 'personal:,']);

//Agregar Rol

Route::get('personal/create/user/{id}', 'StaffController@showNewRoleForm')->middleware(['auth', 'personal:,']);
Route::post('personal/created/user/{id}', 'StaffController@newRoleCreated')->middleware(['auth', 'personal:,']);
