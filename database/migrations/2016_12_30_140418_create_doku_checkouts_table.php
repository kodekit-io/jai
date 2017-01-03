<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokuCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doku_checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address');
            $table->string('process_type');
            $table->integer('order_id');
            $table->double('amount');
            $table->string('response_code')->nullable();
            $table->string('status_code')->nullable();
            $table->string('result_msg')->nullable();
            $table->dateTime('payment_datetime')->nullable();
            $table->string('payment_channel')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('words');
            $table->string('session_id');
            $table->string('bank')->nullable();
            $table->string('credit_card')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('doku_checkouts');
    }
}
