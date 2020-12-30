<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function category()
  {
      return $this->belongsTo(Category::class);
  }
  public function subcategory()
  {
      return $this->hasOne(Sub_category::class,'id','sub_category_id');
  }
  public function user()
  {
      return $this->hasOne(User::class,'id','creator');
  }
}
