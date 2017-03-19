<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoundCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('found_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('call_id');
            $table->integer('car_id');
            $table->string('Remark', 255);
        });
        Schema::create('found_cars', function ($table) {
            $table->foreign('call_id')->references('id')->on('call_record');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('found_cars');
    }
}
