<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    //
    protected $table = 'order_products';
    protected $fillable = ['name', 'address', 'pin_code', 'land_mark', 'query', 'time_slot', 'time_slot_details', 'status'];
    protected $hidden = [];
}
