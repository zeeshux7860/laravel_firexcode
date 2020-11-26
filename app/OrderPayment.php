<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Payment extends Model
{
    //
    protected $table = 'Order_Payment';
    protected $fillable = ['order_id', 'payment_mode', 'transaction_id', 'details', 'sale_price', 'status'];
    protected $hidden = [];
}
