<?php

namespace App\Http\Controllers;

use App\Company;
use App\Repository;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    protected function create(){
        $userID = auth()->user()->id;
        $company = Company::where('user_id' ,$userID )->get();
//        dd($company);
        return view('add-form.company' , compact('company'));
    }
    protected function store(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3',
            'location' => 'required'
        ]) ;
        $userID = auth()->user()->id;
        $new_company = new Company();
        $new_company->user_id =$userID;
        $new_company->name = $request->input('name');
        $new_company->location = $request->input('location');
        $new_company->save();
//        User::where('id',$userID)->update(array('hasJob' => true , 'isAdmin' =>true));
        return redirect('/add/company');
    }

    }
