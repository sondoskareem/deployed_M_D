<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function repository()
    {
        return $this->belongsTo(Repository::class);
    }
    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
    public function employee_goods()
    {
        return $this->hasOne(Employee_Goods::class);
    }
}
