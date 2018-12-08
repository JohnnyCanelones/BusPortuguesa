<?php 
use App\User;
use App\Staff;
use App\Almacen;
use App\StaffMonitoring;


Route::get('/presidente', 'PresidenciaController@home');

Route::get('/presidente/monitoreo/personal', 'PresidenciaController@showStaffMonitoring');

Route::get('/presidente/monitoreo/almacen', 'PresidenciaController@showWarehouseMonitoring');

Route::get('presidente/monitoreo/usuario/{id}', function($id) {
    
    $monitoreo = Staff::find($id);
    
    return $monitoreo;
});

Route::get('/presidente/monitoreos/', function() {
    
    $monitoreos = count(StaffMonitoring::all());

    return $monitoreos;
});

Route::get('presidente/monitoreo/almacen/{id}', function($id) {
    
    $monitoreo = Almacen::find($id);
    
    return $monitoreo;
});
Route::get('/presidente/monitoreos/almacen', function() {
    
    $monitoreos = count(Almacen::all());

    return $monitoreos;
});

