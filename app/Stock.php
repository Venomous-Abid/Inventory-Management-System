<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function product()
    {
      return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','creator');
    }
}
