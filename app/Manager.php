<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = "managers";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
