<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    protected $table = 'peticion';
    protected $guarded = [];

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'almacen_id');
    }

    public function buses()
    {
        return $this->belongsTo(Buses::class, 'bus_id');
    }

   
}
