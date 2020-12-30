<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $table = "sub_category";

    public function category()
    {
      return $this->hasOne(Category::class,'id','category_id');
    }

    public function user()
    {
        return $this->hasone(User::class,'id','created_by');
    }
}
