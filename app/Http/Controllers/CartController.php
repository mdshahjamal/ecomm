<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use Session;

class CartController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }
    
    public function addToCart(Request $request,$product_id){
    	$check = Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
    	if($check){
    		Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('quantity');
    		return redirect()->back()->with('success', 'Wow! Product Added On Cart');
    	}else{
    	Cart::insert([
    		'product_id' => $product_id,
    		'quantity' => 1,
    		'price' => $request->price,
    		'user_ip' => request()->ip(),
    	]);

    	return redirect()->back()->with('success', 'Wow! Product Added On Cart');
    	}
    }

    public function cartPage(){
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->quantity;
        });
        return view('frontend.cart',compact('carts','subtotal'));
    }

    public function destroy($id){
        // return $cart_id;
         Cart::where('id',$id)->where('user_ip',request()->ip())->delete();

         return redirect()->back()->with('dlt', 'Product Removed From Cart');
    }

    public function quantityUpdate(Request $request,$id){
        Cart::where('id',$id)->where('user_ip', request()->ip())->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('msg', 'Product Quantity Updated!');
    }

    // public function applyCoupon(Request $request){
    //     // dd($request->all());
    //     Cart::where('id',$id)->where('user_ip', request()->ip())->update([
    //         'quantity' => $request->quantity,
    //     ]);

    //     return redirect()->back()->with('msg', 'Product Quantity Updated!');
    // }

    public function applyCoupon(Request $request){
        $check = Coupon::where('coupon_name', $request->coupon_name)->first();
         if ($check){
                Session::put('coupon',[
                    'coupon_name' =>$check->coupon_name,
                    'discount' =>$check->discount,
                ]);
            return Redirect()->back()->with('msg', 'Coupon Applied Successsfully');
         }else{
            return Redirect()->back()->with('dlt', 'Invalid Coupon');
         }
        // dd($request->all());
    }

    public function couponDestroy(){
        if (Session::has('coupon')){
            session()->forget('coupon');
            return Redirect()->back()->with('dlt', 'Coupon Removed');
        }
    }
}
