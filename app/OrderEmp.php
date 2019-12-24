<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderEmp extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }
}
