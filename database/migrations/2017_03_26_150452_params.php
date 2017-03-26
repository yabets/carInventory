<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Params extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('params', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable()->default(null);
            $table->string('Brand');
            $table->string('Name');
            $table->string('Type');
            $table->string('Color');
            $table->string('Status');
            $table->string('Transmission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('params');
    }
}
