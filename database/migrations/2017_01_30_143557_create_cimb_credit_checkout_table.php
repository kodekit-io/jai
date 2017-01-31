<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCimbCreditCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cimb_credit_checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('order_id')->unsigned();
            $table->string('process_type');
            $table->string('transaction_id');
            $table->string('txn_status');
            $table->string('txn_signature');
            $table->string('secure_signature');
            $table->string('auth_id');
            $table->string('tran_date')->nullable();
            $table->string('sales_date')->nullable();
            $table->string('response_code');
            $table->string('response_desc')->nullable();
            $table->string('merchant_tranid');
            $table->string('customer_id')->nullable();
            $table->string('fr_level')->nullable();
            $table->string('fr_score')->nullable();
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
        Schema::dropIfExists('cimb_credit_checkouts');
    }
}
