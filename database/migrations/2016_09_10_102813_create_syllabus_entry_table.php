<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyllabusEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syllabus_entries', function (Blueprint $table) {
            $table->increments('id');
						$table->integer('syllabus_id')->unsigned()->index();
            $table->integer('content_id')->unsigned()->index();
						$table->integer('ordering')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('syllabus_entries');
    }
}
