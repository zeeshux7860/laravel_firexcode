<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('products', function (Blueprint $table) {
    $table->id();
       $table->longText('meta_title');
$table->longText('meta_des');
$table->longText('title');
$table->longText('des');
$table->longText('important_notice');
$table->longText('product_tag');
$table->longText('model');
$table->longText('seo');
$table->longText('category');
$table->longText('sku_number');
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
          Schema::drop('products');
    }
}
