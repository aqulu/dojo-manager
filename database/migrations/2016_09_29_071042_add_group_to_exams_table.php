<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupToExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
						$table->string('examination_time');
            $table->integer('group_id')->unsigned()->index();
            $table->string('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
						$table->dropColumn('examination_time');
            $table->dropColumn('group_id');
            $table->dropColumn('remarks');
        });
    }
}
