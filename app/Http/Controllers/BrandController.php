<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }
    public function index(){
     $brands = Brand::latest()->paginate(5);
     return view('admin.brand.index',compact('brands'));

 }

 public function store(Request $request){
   $request->validate([
      'brand_name' => 'required|unique:brands,brand_name'

  ]);
   Brand::insert([
      'brand_name' => $request->brand_name,
      'created_at' => Carbon::now()

  ]);

   return Redirect()->back()->with('msg', 'Brand Inserted Successsfully!');
}

public function edit($id){
   $brands = Brand::find($id);
   return view('admin.brand.edit', compact('brands'));
}

public function update(Request $request, $id){
   $request->validate([
      'brand_name' => 'required|unique:brands,brand_name'

  ]);
   $brands = Brand::find($id)->update([
      'brand_name' => $request->brand_name,
      'updated_at' => Carbon::now()

  ]);

   return Redirect()->route('brand')->with('msg', 'Brand Updated Successsfully!');
}

public function delete($id){
   $brand = Brand::find($id)->delete();
   return Redirect()->back()->with('dlt', 'Brand Deleted Successsfully!');
}

public function inactive($id){
   Brand::find($id)->update(['status'=>0]);
   return Redirect()->back()->with('dlt', 'Brand Inactivated Successsfully!');
}

public function active($id){
   Brand::find($id)->update(['status'=>1]);
   return Redirect()->back()->with('msg', 'Brand Activated Successsfully!');
}


}
