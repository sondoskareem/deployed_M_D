<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile extends Controller
{
    protected function profile(){
       return view('profile.add-info');
    }
    protected function repo_goods(){
        return view('profile.repo_goods');

    }
}
