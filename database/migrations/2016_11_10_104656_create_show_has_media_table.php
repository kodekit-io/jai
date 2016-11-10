<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowHasMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_has_medias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->string('media_type')->default('featured');

            $table->foreign('show_id')
                ->references('id')
                ->on('shows')
                ->onDelete('cascade');

            $table->foreign('media_id')
                ->references('id')
                ->on('media')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('show_has_medias');
    }
}
