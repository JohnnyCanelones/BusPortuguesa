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
            $table->foreign('conductor_id')->references('id')->on('users');
            $table->string('estado');
            $table->date('fecha_inactivo');


            
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
