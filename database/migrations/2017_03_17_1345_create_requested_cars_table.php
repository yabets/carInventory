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
            $table->dateTime('deleted_at')->nullable()->default(null);
            $table->integer('call_id')->unsigned();
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
            $table->foreign('call_id')->references('id')->on('call_records');
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
