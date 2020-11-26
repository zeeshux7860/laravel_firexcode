<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerVertical extends Model
{
    //
    protected $table = 'BannerVertical';
    protected $fillable = ['image_url', 'action_type', 'action_name', 'action_id', 'vertical_id', 'status'];
    protected $hidden = [];
}
