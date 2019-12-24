<?php

namespace App\Http\Controllers;

use App\Goods;
use App\Repository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userID = auth()->user()->id;
//        dd('$userID');
        $goods = Goods::where( 'user_id' , $userID)->where('user_id' ,  $userID)->get();
//        dd($goods);
        return view('home' ,compact('goods') );
    }
}
