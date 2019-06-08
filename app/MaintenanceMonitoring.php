<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceMonitoring extends Model
{
    protected $guarded = [];
	
	public $timestamps = false;


	public function user(){
 		return $this->belongsTo(User::class, 'user_id');
		
	} 
    public function mantenimientos(){
         return $this->belongsTo(Mantenimiento::class, 'mantenimiento_id');

 	}

}
