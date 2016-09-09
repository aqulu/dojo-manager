<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_programs', function (Blueprint $table) {
            $table->integer('belt_id')->unsigned()->index();
            $table->integer('group_id')->unsigned()->index();
						$table->primary(array('belt_id', 'group_id'));
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_programs');
    }
}
