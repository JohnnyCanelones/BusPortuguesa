<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffMonitoring extends Model
{
 	protected $guarded = [];
	
	public $timestamps = false;
    protected $table = 'staff_monitoring';
    protected $primaryKey = 'id';


    public function staff(){
         return $this->belongsTo(Staff::class, 'staff_id');

 	}

 	public function user(){
 		return $this->belongsTo(User::class, 'user_id');   
 	}
}
