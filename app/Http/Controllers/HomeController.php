<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

        public function request()
    {

        $orders = Order::all();
      

        return view('request',['orders'=>$orders,'id'=>Auth::user()->id]);
    }
        public function shop()
    {
        return view('shop');
    }
        public function catalog()
    {
        return view('catalog');
    }

}
