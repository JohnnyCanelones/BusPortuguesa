<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->string('nationality');
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->string('names');
            $table->string('last_names');
            $table->datetime('date_birth')->nullable();
            $table->string('email')->unique();
            $table->string('genre');
            $table->string('address');
            $table->string('phone_number');
            $table->string('position');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
