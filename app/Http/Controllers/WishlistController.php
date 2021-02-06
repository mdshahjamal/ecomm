<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;

class WishlistController extends Controller
{
    public function addToWishlist($product_id){
    	if (Auth::check()){
    		Wishlist::insert([
    		'user_id' => Auth::id(),
    		'product_id' => $product_id,
    	]);
    		return Redirect()->back()->with('msg', 'Product Added On Wishlist');

    	}else{
    		return Redirect()->route('login')->with('login', 'At First Login Your Account');
    	}
    	
    }

    public function wishPage(){
    	$wishlists = Wishlist::where('user_id', Auth::id())->latest()->get();
    	return view('frontend.wishlist', compact('wishlists'));
    }

    public function destroy($id){
        // return $cart_id;
         Wishlist::where('id',$id)->where('user_id',Auth::id())->delete();

         return redirect()->back()->with('dlt', 'Product Removed From Wishlist');
    }
}
