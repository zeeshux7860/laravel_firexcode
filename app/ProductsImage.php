<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
    //
    protected $table = 'products_image';
    protected $fillable = ['product_id', 'image_url', 'status'];
    protected $hidden = [];
}
