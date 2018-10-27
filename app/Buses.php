<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'conductor_id');
    }

    public function peticion(){
 		return $this->hasOne(Peticion::class, 'bus_id');   
 	}
}
