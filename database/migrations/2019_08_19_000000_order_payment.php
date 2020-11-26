<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order_payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->longText('payment_mode');
            $table->longText('transaction_id');
            $table->longText('details');
            $table->double('sale_price', null, null);
            $table->integer('status');

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
        Schema::drop('order_payment');
    }
}
