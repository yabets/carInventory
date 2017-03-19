<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Name', 30);
            $table->char('Phone', 15)->unique();
            $table->char('AltPhone', 15)->nullable();
            $table->boolean('Owner');
            $table->string('Remark', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('owner');
    }
}
