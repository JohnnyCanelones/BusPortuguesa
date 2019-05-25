<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusesMonitoring extends Model
{
      protected $guarded = [];
	
	public $timestamps = false;


    public function buses(){
        return $this->belongsTo(Buses::class, 'bus_id');

 	}

 	public function user(){
 		return $this->hasOne(User::class, 'id');
 	} 
}

