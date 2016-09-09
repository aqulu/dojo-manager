<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamProgramsContentsRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_exam_program', function (Blueprint $table) {
						$table->integer('exam_program_id')->unsigned()->index();
            $table->integer('content_id')->unsigned()->index();
						$table->primary(array('exam_program_id', 'content_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('content_exam_program');
    }
}
