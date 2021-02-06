<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;

class CheckoutController extends Controller
{
    public function index(){
    	if (Auth::check()){
    		$carts = Cart::where('user_ip',request()->ip())->latest()->get();
        	$subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->quantity;
        });
    		return view('frontend.checkout',compact('carts','subtotal'));
    	}else{
    		return redirect()->route('login');
    	}
    	
    }
}
