<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'mantenimiento';


    public function staffs() {
        return $this->belongsToMany(Staff::class, 'mantenimiento_staff');

    }

    public function buses()
    {
        return $this->belongsTo(Buses::class, 'bus_id');
    }

}
