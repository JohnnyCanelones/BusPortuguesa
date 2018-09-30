<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAlmacen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_producto');
            $table->string('compatibilidad');
            $table->integer('cantidad');
            $table->string('ubicacion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almacen');
    }
}
