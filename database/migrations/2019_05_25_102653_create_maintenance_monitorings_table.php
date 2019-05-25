<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_monitorings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('mantenimiento_id')->unsigned()->nullable();
            $table->foreign('mantenimiento_id')->references('id')->on('mantenimiento')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('username')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('maintenance_monitorings');
    }
}
