<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacen';
    protected $guarded = [];
   	public $timestamps = false;

   	public function peticion(){
 		return $this->hasOne(Peticion::class, 'almacen_id');   
 	}
}
