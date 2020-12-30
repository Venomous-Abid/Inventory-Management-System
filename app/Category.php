<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    public function user()
    {
        return $this->hasone(User::class,'id','created_by');
    }
    public function subcategory()
    {
        return $this->hasMany(Sub_category::class);
    }
}
