<?php 

use App\Peticion;


$peticionesPendientes = Peticion::where('estado', 'Pendiente')->get();
$peticionesPendientes->load('almacen');