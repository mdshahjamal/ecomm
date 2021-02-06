<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Shipping;

class InvoiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    // public function invoice($order_id){
    // 	$order = Order::findOrFail($order_id);
    // 	$orderItems = OrderItem::where('order_id',$order_id)->get();
    // 	$shipping = Shipping::where('order_id',$order_id)->first();
    // 	return view('admin.order.invoice',compact('order','orderItems','shipping'));
    // }
}
