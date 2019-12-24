<?php

namespace App\Http\Controllers;

use App\Repository;
use App\Role;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    protected function create(){
        $repo = Repository::where('user_id' ,auth()->user()->id)->get();
        return view('add-form.repo' , compact('repo'));
    }
    public function store(Request $request){
        $userID = auth()->user()->id;
        $repo = new Repository();
        $repo->user_id = $userID;
        $repo->name = request('name');
        $repo->location = request('location');
        $repo->save();
        return redirect('/add/repo');

    }
}
