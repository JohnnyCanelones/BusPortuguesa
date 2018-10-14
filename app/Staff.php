<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
 	protected $guarded = [];

 	public function user(){
 		return $this->hasOne(User::class, 'username');   
 	}

 	public function bus()
    {
        return $this->hasOne(Buses::class);
    }

}
