<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseMonitoring extends Model
{
    protected $guarded = [];
	
	public $timestamps = false;


    public function almacen(){
         return $this->belongsTo(Almacen::class, 'almacen_id');

 	}

 	public function user(){
 		return $this->hasOne(User::class, 'id');   
 	}
}
