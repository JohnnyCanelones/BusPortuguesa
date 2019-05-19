<?php 
use App\User;
use App\Staff;
use App\Almacen;
use App\StaffMonitoring;
use App\WarehouseMonitoring;
use App\PetitionMonitoring;

use App\Peticion;

Route::group(['middleware' => ['auth', 'admin:,']], function() {


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

Route::get('presidente/monitoreo/peticion/{id}', function($id) {
    
    $peticion = Peticion::find($id);
    $monitoreo = ['peticion' => $peticion, 'producto' => $peticion->almacen];
    // dd($monitoreo->almacen);
    return $monitoreo;
});

Route::get('/presidente/monitoreos/almacen', function() {
    
    $monitoreos = count(WarehouseMonitoring::all());
    $monitoreos2 = count(PetitionMonitoring::all());
    $total = $monitoreos + $monitoreos2;
   
    return $total;
});

});