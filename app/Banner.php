<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table = 'Banner';
    protected $fillable = ['image_url', 'action_type', 'action_name', 'action_id', 'status'];
    protected $hidden = [];
}
