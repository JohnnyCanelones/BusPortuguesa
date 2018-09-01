<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Buses;
use App\Staff;

class BusesController extends Controller
{
    public function showBusForm()
    {
        return view('mantenimiento.buses.register');
    }
}
