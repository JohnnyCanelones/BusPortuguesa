<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDeBuses extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Buses', function (Blueprint $table) {
            $table->integer('id_bus')->unsigned();
            $table->primary('id_bus');
            
            // por ahora rutas sin relacion
            $table->string('rutas');

            $table->integer('conductor_id')->unsigned();
            $table->foreign('conductor_id')->references('id')->on('staff');

            $table->string('estado');
            $table->string('motivo_inactividad')->nullable();
            $table->datetime('fecha_inactivo')->nullable();
            $table->string('observacion')->nullable();


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Buses');
    }
}
