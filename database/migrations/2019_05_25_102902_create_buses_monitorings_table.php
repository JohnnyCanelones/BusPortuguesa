<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses_monitorings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('bus_id')->unsigned()->nullable();
            $table->foreign('bus_id')->references('id_bus')->on('buses')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('accion');

            // $table->integer('stock_added')->nullable();


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
        Schema::dropIfExists('buses_monitorings');
    }
}
