<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee_Goods;
use App\Employees;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    protected function validateRequest(){

        return request()->validate([
            'name' =>'required|min:3',
            'size' => 'required',
            'location' => 'required',
            'user_id' => 'required',
        ]) ;
    }
    protected function create(){
        $userID = auth()->user()->id;
        $user = User::where('isAdmin' , false)->where('hasJob' , false)->where('superAdmin' , false)->get();
        $employee = Employees::where('manager_id' , $userID)->get();
        return view('add-form.employees' , compact('user'  ,'employee' ));
    }
    protected function store(Request $request){
        $userID = auth()->user()->id;
        $new_employee = new Employees();
        $new_employee->user_id = request('user_id');
        $new_employee->manager_id =$userID;
        $new_employee->name = request('name');
        $new_employee->company_id =auth()->user()->company->id;
        $new_employee->role_id = request('role_id');
        $new_employee->save();
        User::where('id',request('user_id'))->update(array('hasJob' => true ));
        return redirect('/add/employees');
    }
//    protected function taskFinish(){
//        $userID = auth()->user()->id;
////        $goods = Goods::where( 'taken' , true)->where('user_id' ,  $userID)->get();
//        $emp_goods = Employee_Goods::where('user_id' , $userID)->with(['employee' , 'goods'])->get();
////        dd($emp_goods->employee_id);
////        $employee = Employees::where('')
//        return view('slidNav.finished' , compact('emp_goods') );
//    }

    protected function all(){
        $userID = auth()->user()->id;
        $employee = Employees::where('manager_id' , $userID)->get();
//        dd($employee);
         return view('slidNav.employees' , compact('employee'));
    }

}
