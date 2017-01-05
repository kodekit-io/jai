<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCimbCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cimb_checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('process_type');
            $table->bigInteger('order_id')->unsigned();
            $table->string('payment_id');
            $table->double('amount');
            $table->string('currency');
            $table->string('remark');
            $table->string('trans_id');
            $table->string('auth_code');
            $table->string('status');
            $table->string('error_desc');
            $table->text('message');
            $table->string('signature');
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
        Schema::dropIfExists('cimb_checkouts');
    }
}
