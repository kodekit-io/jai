<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalasysTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galasys_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('order_id')->unsigned();
            $table->string('code');
            $table->string('name');
            $table->string('barcode');
            $table->string('e_ticket');
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
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
        Schema::dropIfExists('galasys_tickets');
    }
}
