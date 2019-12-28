<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected function validateRequest(){
        return request()->validate([
            'user_id' => 'required',
            'jobDescription' => 'required'
        ]) ;
    }
    protected function create(){
        $roles = Role::where('user_id' ,auth()->user()->id)->get();
        return view('add-form.roles' , compact('roles'));
    }
    public function store(Request $request){
        $userID = auth()->user()->id;
        $role = new Role();
        $role->user_id = $userID;
        $role->jobDescription = request('jobDescription');
        $role->degree = request('degree');
        $role->save();
        return redirect('/add/roles');
    }
}
