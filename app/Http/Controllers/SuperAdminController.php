<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    protected function index(){
        return view('superAdminPage');
    }
}
