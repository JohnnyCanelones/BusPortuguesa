<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
 	protected $guarded = [];
    public $timestamps = false;
 	

 	public function user(){
 		return $this->hasOne(User::class, 'username');   
 	}

 	public function bus()
    {
        return $this->hasOne(Buses::class);
    }

    public function staff_monitoring()
    {
        return $this->hasOne(StaffMonitoring::class, 'staff_id');
    }

    public function mantenimientos() {
        return $this->belongsToMany(Mantenimiento::class, 'mantenimiento_id');

    }


}
