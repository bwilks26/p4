<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    # Define products/statuses relation, using pivot table
    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }

}
