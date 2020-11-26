<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $table = 'SubCategory';
    protected $fillable = ['category_id', 'category_name', 'sub_category_name', 'status'];
    protected $hidden = [];
}
