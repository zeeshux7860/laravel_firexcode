<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTimeSlot extends Model
{
    //
    protected $table = 'Order_Time_Slot';
    protected $fillable = ['days', 'details', 'status'];
    protected $hidden = [];
}
