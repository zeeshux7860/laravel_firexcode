<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    protected $table = 'order_details';
    protected $fillable = ['name', 'address', 'pin_code', 'land_mark', 'query', 'time_slot', 'time_slot_details', 'payment_mode','status'];
    protected $hidden = [];
}
