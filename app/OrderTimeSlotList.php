<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTimeSlotList extends Model
{
    //
    protected $table = 'Order_Time_Slot_List';
    protected $fillable = ['days', 'time_slot_id', 'timeing', 'status'];
    protected $hidden = [];
}
