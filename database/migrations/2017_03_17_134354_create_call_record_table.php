<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_records', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('found');
            $table->boolean('wantSee');
            $table->dateTime('schedule')->nullable();
            $table->boolean('checked')->nullable();
            $table->boolean('sold')->nullable();
            $table->string('Remark', 255)->nullable();
            $table->integer('buyer_id');

        });

        Schema::table('call_records', function($table){
            $table->foreign('buyer_id')->references('id')->on('buyer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('call_records');
    }
}
