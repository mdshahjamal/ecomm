<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Carbon\Carbon;
use Auth;
use Session;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function storeOrder(Request $request){
    	// dd($request->all());

    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
    	]);

    	$order_id = Order::insertGetId([
    		'user_id' => Auth::id(),
    		'invoice_no' => mt_rand(10000000,99999999),
    		'payment_type' => $request->payment_type,
    		'total' => $request->total,
    		'subtotal' => $request->subtotal,
    		'coupon_discount' => $request->coupon_discount,
    		'created_at' => Carbon::now(),

    	]);

    	$carts = Cart::where('user_ip',request()->ip())->latest()->get();
    		foreach ($carts as $cart) {
    			OrderItem::insert([
    				'order_id' => $order_id,
    				'product_id' => $cart->product_id,
    				'product_qty' => $cart->quantity,
    				'created_at' => Carbon::now(),
    			]);
    		}

    		Shipping::insert([
    			'order_id' => $order_id,
    			'first_name' => $request->first_name,
    			'last_name' => $request->last_name,
    			'email' => $request->email,
    			'phone' => $request->phone,
    			'address' => $request->address,
    			'state' => $request->state,
    			'post_code' => $request->post_code,
    			'created_at' => Carbon::now(),

    		]);

    		if (Session::has('coupon')){
            session()->forget('coupon');
        	}

        	$carts = Cart::where('user_ip',request()->ip())->delete();
            return Redirect()->to('order/success')->with('orderComplete', 'Bravo! Your Order Completed Successfully');
    }

    public function orderSuccess(){
    	return view('frontend.order-complete');
    }
}
