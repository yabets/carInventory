<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestedCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('call_id');
            $table->string('Brand', 30);
            $table->string('Name', 30);
            $table->char('Year', 4);
            $table->string('Color', 30)->nullable();
            $table->integer('PriceFrom')->nullable();
            $table->integer('PriceTo')->nullable();
            $table->string('Transmission', 30)->nullable();
            $table->string('Plate', 30)->nullable();
            $table->string('Status', 15);
            $table->string('Meri', 30);
            $table->string('Remark', 255)->nullable();
        });
        Schema::create('requested_cars', function ($table) {
            $table->foreign('call_id')->references('id')->on('call_record');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('requested_cars');
    }
}
