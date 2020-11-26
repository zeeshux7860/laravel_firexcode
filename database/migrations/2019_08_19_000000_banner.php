<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Banner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('banner', function (Blueprint $table) {
    $table->id();
       $table->longText('image_url');
$table->integer('action_type');
$table->integer('action_name');
$table->integer('action_id');
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
          Schema::drop('banner');
    }
}
