<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentMediaRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_media', function (Blueprint $table) {
            $table->integer('content_id')->unsigned()->index();
            $table->integer('media_id')->unsigned()->index();
						$table->primary(array('content_id', 'media_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('content_media');
    }
}
