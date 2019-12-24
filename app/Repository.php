<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function goods()
    {
        return $this->hasMany(Goods::class);
    }
}
