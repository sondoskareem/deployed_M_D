<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    protected function create(){
        $userID = auth()->user()->id;

        return view('slidNav.customers');
    }
    protected function store(Request $request){
        $userID = auth()->user()->id;
        $customer = new Customers();
        $customer->user_id = $userID;
        $customer->name =  request('name');
        $customer->phone =  request('phone');
        $customer->location =  request('location');
        $customer->save();
        return redirect('/all/customers');
    }
    protected function index(){
        $user= auth()->user();
//        $customers = Customers::where('user_id' ,$userID )->get();
        return view('slidNav.all_customers' , compact('user'));
    }
}
