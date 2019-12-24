<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Goods;
use App\OrderEmp;
use App\Orders;
use App\User;
use Illuminate\Http\Request;

class OrderEmpController extends Controller
{
   public function asignForm(Goods $goods){
       $userID = auth()->user()->id;
       $employee = Employees::where('manager_id',$userID)->get();
       return view('add-form.asignForm' , compact('goods' , 'employee'));
   }
    public function asign(Request $request){
//       dd(request('employee'));
        $userID = auth()->user()->id;
        $orderEmp = new OrderEmp();
        $orderEmp->user_id = $userID;
        $orderEmp->goods_id = request('goods_id');
        $orderEmp->employee_id = request ('employee_id');
        $orderEmp->save();
//        dd($orderEmp);
        return redirect('/home');
    }
    public function asignOrderForm(Orders $orders){
        $userID = auth()->user()->id;
        $employee = Employees::where('manager_id',$userID)->get();
        return view('add-form.asignOrderForm' , compact('orders' , 'employee'));
    }
    public function asign_order(Request $request){
//       dd($orders);
        $userID = auth()->user()->id;
        $orderEmp = new OrderEmp();
        $orderEmp->user_id =$userID;
        $orderEmp->order_id = request('order_id');
        $orderEmp->employee_id =  request('employee_id');
        $orderEmp->save();
        Orders::where('id',request('order_id'))->update(array('taken' => true ));
        return redirect('/all/orders');
    }
    public function OrdersTakent(){
        $userID = auth()->user()->id;
        $orderTaken = OrderEmp::where('user_id' ,$userID )->where('order_id', '!=' , null)->get();
//        dd($orderEmp);
        return view('slidNav.ordersTaken' , compact('orderTaken'));
    }
}
