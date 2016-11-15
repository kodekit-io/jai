<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department')->nullable();
            $table->date('active_date');
            $table->string('contact_person');
            $table->timestamps();
        });

        Schema::create('career_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('career_id')->unsigned();
            $table->string('lang');
            $table->string('slug');
            $table->string('position');
            $table->text('description');

            $table->foreign('career_id')
                ->references('id')
                ->on('careers')
                ->onDelete('cascade');
        });

        Schema::create('career_metas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('career_id')->unsigned();
            $table->string('meta_key');
            $table->text('meta_value');

            $table->foreign('career_id')
                ->references('id')
                ->on('careers')
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
        Schema::dropIfExists('career_details');

        Schema::dropIfExists('careers');
    }
}
