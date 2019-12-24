<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function employee()
    {
        return $this->hasMany(Employees::class);
    }
}
// Schema::create('order-emps', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->unsignedBigInteger('order_id');
//            $table->unsignedBigInteger('user_id');
//            $table->unsignedBigInteger('employee_id');
//            $table->boolean('delivered')->default(false);
//            $table->timestamps();
//        });
