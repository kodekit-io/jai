<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_type_id')->default(1);
            $table->double('normal_price')->default(0);
            $table->double('weekend_price')->default(0);
            $table->double('holiday_price')->default(0);
            $table->integer('created_by');
            $table->timestamps();
        });

        Schema::create('package_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();

            $table->foreign('package_id')
                ->references('id')
                ->on('packages')
                ->onDelete('cascade');
        });

        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('code');
            $table->text('description')->nullable();
            $table->integer('coupon_type')->default(1); // percentage or amount
            $table->integer('usage_type')->default(1); // per order or per person
            $table->double('value')->default(0);
            $table->timestamps();
        });

        Schema::create('package_has_coupons', function (Blueprint $table) {
            $table->integer('package_id')->unsigned();
            $table->integer('coupon_id')->unsigned();
            $table->foreign('package_id')
                ->references('id')
                ->on('packages')
                ->onDelete('cascade');

            $table->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
                ->onDelete('cascade');

            $table->primary(['package_id', 'coupon_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_has_coupons');

        Schema::dropIfExists('coupons');

        Schema::dropIfExists('package_details');

        Schema::dropIfExists('packages');
    }
}
