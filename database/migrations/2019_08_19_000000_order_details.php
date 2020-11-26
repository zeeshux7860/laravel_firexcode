<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('address');
            $table->bigInteger('pin_code');
            $table->longText('land_mark');
            $table->longText('query');
            $table->longText('time_slot');
            $table->longText('time_slot_details');
            $table->longText('payment_mode');
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
        Schema::drop('order_details');
    }
}
