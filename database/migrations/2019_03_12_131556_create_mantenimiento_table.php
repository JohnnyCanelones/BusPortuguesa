<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha')->nullable();

            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id_bus')->on('buses');

            $table->integer('kilometraje');
            $table->string('tipo_mantenimiento');
            $table->string('tipo_servicio');
                        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantenimiento');
    }
}
