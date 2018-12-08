<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetitionMonitoring extends Model
{
 	protected $guarded = [];
	
	public $timestamps = false;


    public function peticion(){
         return $this->belongsTo(Peticion::class, 'peticion_id');

 	}

 	public function user(){
 		return $this->hasOne(User::class, 'id');
 	}  
}
