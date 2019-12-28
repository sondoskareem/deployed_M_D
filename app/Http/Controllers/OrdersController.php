<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected function create(){
        $user = auth()->user();
        return view('slidNav.add-orders' , compact('user'));
    }
    protected function store(Request $request){
        $userID = auth()->user()->id;
        $order = new Orders();
        $order->user_id = $userID;
        $order->customer_id =  request('customer_id');
        $order->goods_id =  request('goods_id');
        $order->dest =  request('dest');
        $order->count =  request('count');
        $order->save();
        return redirect('/all/orders');
    }
    protected function index(){
        $user = auth()->user();
//        $order = Orders::where('user_id' ,$userID )->get();
        return view('slidNav.all-orders' , compact('user'));
    }
    protected function orderByID(Orders $order){
//        dd($order);
        $userID = auth()->user()->id;
        $order = Orders::where('user_id' ,$userID)->where('id' , $order->id)->get();
//        dd($order);
        return view('profile.order_profile' , compact('order'));
    }
}
