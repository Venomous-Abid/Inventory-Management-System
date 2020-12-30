<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    const ACCESS_LEVEL_MARKET = 'Marketing';
    const ACCESS_LEVEL_ACCOUNT = 'Account';
    protected $table = "staff";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
