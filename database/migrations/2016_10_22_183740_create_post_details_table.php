<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_details', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->string('lang')->default('en');
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->primary(['post_id', 'lang']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('slug');
            $table->dropColumn('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_details');

        Schema::table('posts', function (Blueprint $table) {
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();
        });
    }
}
