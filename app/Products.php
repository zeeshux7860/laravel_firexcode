<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['meta_title', 'meta_des', 'title', 'des', 'important_notice', 'product_tag', 'model', 'seo', 'category', 'sku_number', 'status'];
    protected $hidden = [];
}
