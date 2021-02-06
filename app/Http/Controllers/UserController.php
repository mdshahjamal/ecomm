<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Auth;

class UserController extends Controller
{
    public function order(){
    	$orders = Order::where('user_id', Auth::id())->latest()->get();
    	return view('frontend.profile.order',compact('orders'));
    }

    public function orderView($order_id){
    	$order = Order::findOrFail($order_id);
    	$orderItems = OrderItem::with('product')->where('order_id',$order_id)->get();
    	$shipping = Shipping::where('order_id',$order_id)->first();
    	return view('frontend.profile.order-view',compact('order','orderItems','shipping'));
    }
}
