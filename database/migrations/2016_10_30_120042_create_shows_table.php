<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('shows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_type')->default(1);
            $table->integer('created_by')->default(1);
            $table->timestamps();
        });

        Schema::create('show_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_id')->unsigned();
            $table->string('lang')->default('en');
            $table->text('content')->nullable();

            $table->foreign('show_id')
                ->references('id')
                ->on('shows')
                ->onDelete('cascade');
        });

        Schema::create('show_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_id')->unsigned();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->time('start_time');
            $table->time('end_time')->nullable();

            $table->foreign('show_id')
                ->references('id')
                ->on('shows')
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
        Schema::dropIfExists('show_times');
        Schema::dropIfExists('show_details');
        Schema::dropIfExists('shows');
        Schema::dropIfExists('show_types');
    }
}
