<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable()->default(null);
            $table->string('Brand', 30);
            $table->string('Name', 30);
            $table->char('Year', 4);
            $table->string('Color', 15);
            $table->integer('Price')->nullable();
            $table->string('Transmission', 30)->nullable();
            $table->string('Plate', 15)->nullable();
            $table->string('location', 255);
            $table->string('Status', 30)->nullable();
            $table->string('Meri', 30)->nullable();
            $table->string('Mileage', 6)->nullable();
            $table->string('Remark', 255)->nullable();
            $table->boolean('published');
            $table->integer('counter')->nullable();
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}
