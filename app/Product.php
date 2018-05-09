<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    # Define products/statuses relation, using pivot table
    public function statuses()
    {
        return $this->belongsToMany('App\Status')->withTimestamps();
    }
}
