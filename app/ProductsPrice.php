<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsPrice extends Model
{
    //
    protected $table = 'products_price';
    protected $fillable = ['product_price', 'selling_price', 'stock', 'restric_quantity', 'status'];
    protected $hidden = [];
}
