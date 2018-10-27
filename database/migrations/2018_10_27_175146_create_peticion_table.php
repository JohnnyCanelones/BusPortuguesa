<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeticionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticion', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('almacen_id')->unsigned();
            $table->foreign('almacen_id')->references('id')->on('almacen');

            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id_bus')->on('buses');

            $table->integer('cantidad');
            $table->string('observacion');
            $table->string('estado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticion');
    }
}
