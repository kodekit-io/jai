<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            Schema::dropIfExists('media');
            $table->increments('id');
            $table->string('title');
            $table->string('file_name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('media_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id')->unsigned();
            $table->string('title');
            $table->string('path');
            $table->string('mime_type')->nullable();
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);

            $table->foreign('media_id')
                ->references('id')
                ->on('media')
                ->onDelete('cascade');
        });

        Schema::create('post_has_medias', function(Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('media_id')->unsigned();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->foreign('media_id')
                ->references('id')
                ->on('media')
                ->onDelete('cascade');

            $table->primary(['post_id', 'media_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_has_medias');
        Schema::dropIfExists('media_sizes');
        Schema::dropIfExists('media');
    }
}
