<?php

namespace App\Http\Controllers;

use App\Employee_Goods;
use App\Employees;
use App\Goods;
use Illuminate\Http\Request;

class EmployeeGoodsController extends Controller
{
    protected function taskFinish(){
        $userID = auth()->user()->id;
//        $goods = Goods::where( 'taken' , true)->where('user_id' ,  $userID)->get();
        $emp_goods = Employee_Goods::where('user_id' , $userID)->with(['employee' , 'goods'])->get();
//        dd($emp_goods->employee_id);
//        $employee = Employees::where('')
        return view('slidNav.finished' , compact('emp_goods') );
    }
}
