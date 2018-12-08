<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetitionMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petition_monitorings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('peticion_id')->unsigned()->nullable();
            $table->foreign('peticion_id')->references('id')->on('peticion')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('username')->on('users')->onDelete('cascade');

            $table->string('accion');

            $table->datetime('fecha_accion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petition_monitorings');
    }
}
