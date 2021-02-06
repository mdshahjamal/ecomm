<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Shipping;

class OrderItemController extends Controller
{

	public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
    	$orders = Order::latest()->get();
    	return view('admin.order.index',compact('orders'));
    }
    public function viewOrder($order_id){
    	$order = Order::findOrFail($order_id);
    	$orderItems = OrderItem::where('order_id',$order_id)->get();
    	$shipping = Shipping::where('order_id',$order_id)->first();
    	return view('admin.order.view',compact('order','orderItems','shipping'));
    }
    public function invoiceOrder($order_id){
        $order = Order::findOrFail($order_id);
        $orderItems = OrderItem::where('order_id',$order_id)->get();
        $shipping = Shipping::where('order_id',$order_id)->first();
        return view('admin.order.invoice',compact('order','orderItems','shipping'));
    }
    
}
