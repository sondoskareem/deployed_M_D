<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $guarded = [];
    public function employee_goods()
    {
        return $this->belongsTo(Employee_Goods::class);
    }
}
