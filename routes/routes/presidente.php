<?php 
use App\User;
use App\StaffMonitoring;


Route::get('/presidente', 'PresidenciaController@home');

Route::get('/presidente/monitoreo/personal', 'PresidenciaController@showStaffMonitoring');

Route::get('presidente/monitoreo/usuario/{id}', function($id) {
    
    $monitoreo = User::where('username', $id)->get();

    return $monitoreo[0]->staff;
});

Route::get('/presidente/monitoreos/', function() {
    
    $monitoreos = count(StaffMonitoring::all());

    return $monitoreos;
});

