<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeticionesEspeciales extends Model
{
    protected $table = 'special_petitions';
    protected $guarded = [];
    public $timestamps = false;

    

    public function peticion(){
        return $this->belongsTo(Peticion::class, 'peticion_id');

    }

}
