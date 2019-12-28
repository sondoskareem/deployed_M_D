<?php

namespace App\Http\Controllers;

use App\Employee_Goods;
use App\Employees;
use App\Goods;
use App\Repository;
use App\User;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    protected function create(){
        $userID = auth()->user()->id;
        $repos = Repository::where('user_id' , $userID)->get();
//        $goods = Goods::where('user_id' , $userID)->get();
//dd($goods);
        return view('add-form.goods' , compact('repos' ));
    }
    public function store(Request $request){

        $userID = auth()->user()->id;
        $goods = new Goods();
        $goods->user_id = $userID;
        $goods->repository_id = request('repository_id');
        $goods->desc = request('desc');
        $goods->finalCost = request('finalCost');
        $goods->save();
        return redirect('/add/goods');

    }
    public function available(Goods $goods){
        if($goods->available == true){
            Goods::where('id' , $goods->id)->update(array('available' => false));
        }else{
            Goods::where('id' , $goods->id)->update(array('available' => true));
        }
        return redirect('/home');
    }
//    public function asignForm(Goods $goods){
//        $userID = auth()->user()->id;
//        $employee = Employees::where('manager_id',$userID)->get();
////        dd($employee);
//        return view('add-form.asignForm' , compact('goods' , 'employee' ) );
//    }
//    public function asign(Goods $goods , Employees $employee){
////        dd($goods->id);
//        $userID = auth()->user()->id;
//        $employee_goods = new Employee_Goods();
//        $employee_goods->employee_id = $employee->id;
//        $employee_goods->user_id =$userID;
//        $employee_goods->goods_id = $goods->id;
//        $employee_goods->save();
//        Goods::where('id' , $goods->id)->update(array('taken' => true ));
//        return redirect('/home');
//    }
}
