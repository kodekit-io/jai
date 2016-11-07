<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterShowTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shows', function (Blueprint $table) {
            $table->integer('day')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
        });

        Schema::table('show_details', function(Blueprint $table) {
            $table->string('slug')->after('show_id');
            $table->string('title')->after('show_id');
        });

        Schema::drop('show_times');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
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

        Schema::table('show_details', function(Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('title');
        });

        Schema::table('shows', function (Blueprint $table) {
            $table->dropColumn('day');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
}
