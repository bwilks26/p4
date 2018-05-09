<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function statuses()
    {
        return $this->belongsToMany('App\Status')->withTimestamps();
    }
}
