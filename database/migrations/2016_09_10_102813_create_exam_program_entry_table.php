<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamProgramEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				Schema::dropIfExists('content_exam_program');
        Schema::create('exam_program_entries', function (Blueprint $table) {
            $table->increments('id');
						$table->integer('exam_program_id')->unsigned()->index();
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
        Schema::drop('exam_program_entries');
    }
}
