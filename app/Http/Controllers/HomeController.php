<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;

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
        $shipping = Shipping::first();
        return view('home',compact('shipping'));
    }
}
