<?php 
use App\User;
use App\Staff;
use App\Almacen;
use App\Buses;
use App\StaffMonitoring;
use App\WarehouseMonitoring;
use App\PetitionMonitoring;
use App\MaintenanceMonitoring;
use App\BusesMonitoring;

use App\Peticion;

<<<<<<< HEAD
Route::group(['middleware' => ['auth', 'admin:true,']], function() {
=======
Route::group(['middleware' => ['auth', 'admin:,']], function() {
    Route::get('/presidente', 'PresidenciaController@home');
>>>>>>> 700b924cbe9b9fae6e8af9485ef76579d999dd7f



Route::get('/presidente/monitoreo/personal', 'PresidenciaController@showStaffMonitoring');

Route::get('/presidente/monitoreo/almacen', 'PresidenciaController@showWarehouseMonitoring');
Route::get('/presidente/monitoreo/mantenimiento', 'PresidenciaController@showMaintenanceMonitoring');

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
Route::get('/presidente/monitoreos/mantenimiento', function() {
    
    $monitoreos = count(MaintenanceMonitoring::all());
    $monitoreos2 = count(BusesMonitoring::all());
    $total = $monitoreos + $monitoreos2;
   
    return $total;
});


Route::get('presidente/monitoreo/mantenimiento/{id}', function($id) {
    
    $peticion = Peticion::find($id);
    $monitoreo = ['peticion' => $peticion, 'producto' => $peticion->almacen];
    // dd($monitoreo->almacen);
    return $monitoreo;
});


Route::get('/presidente/buses/{id}', function ($id){
        return Buses::find($id);
});


});