<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialPetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_petitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peticion_id')->unsigned()->nullable();
            $table->foreign('peticion_id')->references('id')->on('peticion')->onDelete('cascade');
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
        Schema::dropIfExists('special_petitions');
    }
}
