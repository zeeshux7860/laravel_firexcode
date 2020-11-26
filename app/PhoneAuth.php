<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneAuth extends Model
{
    //
    protected $table = 'phone_auth';
    protected $fillable = ['phone_no', 'otp', 'ip_address', 'is_account', 'status'];
    protected $hidden = [];
}
