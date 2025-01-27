<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_monitorings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('almacen_id')->unsigned()->nullable();
            $table->foreign('almacen_id')->references('id')->on('almacen')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('accion');

            $table->integer('stock_added')->nullable();


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
        Schema::dropIfExists('warehouse_monitorings');
    }
}
