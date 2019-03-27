<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $table = 'servicios'; 
}
