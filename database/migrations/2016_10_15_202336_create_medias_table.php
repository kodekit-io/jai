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
        Schema::create('medias', function (Blueprint $table) {
            Schema::dropIfExists('media');
            $table->increments('id');
            $table->string('title');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias');
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
        });
    }
}
