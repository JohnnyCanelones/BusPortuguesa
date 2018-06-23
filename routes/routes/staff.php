<?php 

Route::get('personal/registro', 'StaffController@showStaffForm');
Route::post('personal/registrar', 'StaffController@staffCreate');

