<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('user_id');
            $table->dateTime('publish_date');
            $table->timestamps();
        });

        Schema::create('slider_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_id');
            $table->string('lang')->default('en');
            $table->text('content')->nullable();
            $table->string('link')->default('#');
            $table->string('file_name');
            $table->integer('order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_items');

        Schema::dropIfExists('sliders');
    }
}
