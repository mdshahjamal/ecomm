<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;
use Session;

class CouponController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
    	$coupons = Coupon::latest()->get();
     return view('admin.coupon.index', compact('coupons'));
    }
	
	public function store(Request $request){
	    Coupon::insert([
	    	'coupon_name' => strtoupper($request->coupon_name),
	    	'discount' => $request->discount,
	    	'created_at' => Carbon::now(),
	    ]);

	    return Redirect()->back()->with('msg', 'Coupon Inserted Successsfully!');
	    }


	    public function edit($id){
    	$coupons = Coupon::findOrFail($id);
    	return view('admin.coupon.edit', compact('coupons'));
    }

    public function update(Request $request, $id){
    	$request->validate([
    		'coupon_name' => 'required|unique:coupons,coupon_name'

    	]);
    	$coupons = Coupon::find($id)->update([
    		'coupon_name' => $request->coupon_name,
    		'discount' => $request->discount,
    		'updated_at' => Carbon::now()

    	]);

    	return Redirect()->route('coupon')->with('msg', 'Coupon Updated Successsfully!');
    }

    public function delete($id){
    	$coupon = Coupon::find($id)->delete();
    	return Redirect()->back()->with('dlt', 'Coupon Deleted Successsfully!');
    }

    public function inactive($id){
    	Coupon::find($id)->update(['status'=>0]);
    	return Redirect()->back()->with('dlt', 'Coupon Inactivated Successsfully!');
    }

    public function active($id){
    	Coupon::find($id)->update(['status'=>1]);
    	return Redirect()->back()->with('msg', 'Coupon Activated Successsfully!');
    }

    

}
