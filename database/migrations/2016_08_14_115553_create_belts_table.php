<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeltsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordering')->unsigned();
            $table->integer('rank')->unsigned();
            $table->string('type');
            $table->string('color_hex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('belts');
    }
}
