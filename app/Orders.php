<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
    public function orderemp()
    {
        return $this->hasOne(OrderEmp::class);
    }

}
