<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Brand;
use Image;
use Validator;
use Carbon\Carbon;
use File;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }
	public function addProduct(){
    	$categories = Category::latest()->get();
    	$brands = Brand::latest()->get();
    	return view('admin.product.add',compact('categories', 'brands'));
    }

    public function store(Request $request){
    	$request->validate([
    		'product_name'=>'required|max:255',
    		'product_code'=>'required|max:255',
    		'price'=>'required|max:255',
    		'product_quantity'=>'required|max:255',
    		'category_id'=>'required|max:255',
    		'brand_id'=>'required|max:255',
    		'short_description'=>'required',
    		'long_description'=>'required',
            'image_one' => 'required|mimes:jpeg,png,jpg,gif,svg|max:255',
            'image_two' => 'required|mimes:jpeg,png,jpg,gif,svg|max:255',
            'image_three' => 'required|mimes:jpeg,png,jpg,gif,svg|max:255',
        ]);

    	$image_one = $request->file('image_one');
    	$imagePath='public/backend/uploadImages/';
    	if (!file_exists($imagePath)) {
            mkdir($imagePath, 666, true);
        }
    	$imageName = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();;
    	Image::make($image_one)->resize(270,270)->save($imagePath.$imageName);
    	$imageUrl1 = $imagePath.$imageName;
    	
    	$image_two = $request->file('image_two');
    	$imageName = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
    	Image::make($image_two)->resize(270,270)->save($imagePath.$imageName);
    	$imageUrl2 = $imagePath.$imageName;
    	
    	$image_three = $request->file('image_three');
    	$imageName = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
    	
    	Image::make($image_three)->resize(270,270)->save($imagePath.$imageName);
    	$imageUrl3 = $imagePath.$imageName;


    	// $image_one = $request->file('image_one');
    	// $imageName = hexdec(uniqid()).'.'.$image_one->extension();
    	// $location = 'backend/uploadImages/';
    	// $imageUrl1 = 'backend/uploadImages/'.$imageName;
    	// $image_one->move($location,$imageName);

    	// $image_two = $request->file('image_two');
    	// $imageName = hexdec(uniqid()).'.'.$image_two->extension();
    	// $location = 'backend/uploadImages/';
    	// $imageUrl2 = 'backend/uploadImages/'.$imageName;
    	// $image_two->move($location,$imageName);

    	// $image_three = $request->file('image_three');
    	// $imageName = hexdec(uniqid()).'.'.$image_three->extension();
    	// $location = 'backend/uploadImages/';
    	// $imageUrl3 = 'backend/uploadImages/'.$imageName;
    	// $image_three->move($location,$imageName);

    	

    	Product::insert([

    	"category_id" => $request->category_id,
    	'brand_id' => $request->brand_id,
    	'product_name' => $request->product_name,
    	'product_slug' => strtolower(str_replace(' ', '-', $request->product_slug)),
    	'product_code' => $request->product_code,
    	'product_quantity' => $request->product_quantity,
    	'short_description' => $request->short_description,
    	'long_description' => $request->long_description,
    	'price' => $request->price,
    	'image_one' => $imageUrl1,
    	'image_two' => $imageUrl2,
    	'image_three' => $imageUrl3,
    	'status' => $request->status,
    	'created_at' => Carbon::now(),

    	]);
    	return redirect()->back()->with('msg', 'Product Inserted Successsfully!');
    }

    public function manageProduct(){
    	$products = Product::orderBy('id','desc')->paginate(5);
    	return view('admin.product.manage', compact('products'));
    }

    public function editProduct($id){
        $product = Product::findorFail($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.edit', compact('product','categories','brands'));
    }

    public function updateProduct(Request $request){
        $product_id = $request->id;
        $pro=Product::findorFail($product_id);

        
        $imagePath='public/backend/uploadImages/';
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 666, true);
        }

        if($request->file('image_one')){
            $image_one = $request->file('image_one');
            $imageName = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();;
            Image::make($image_one)->resize(270,270)->save($imagePath.$imageName);
            $pro->image_one = $imagePath.$imageName;
        }
        if($request->file('image_two')){
            $image_two = $request->file('image_two');
            $imageName = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270,270)->save($imagePath.$imageName);
            $pro->image_two = $imagePath.$imageName;
        }
        if($request->file('image_three')){
            $image_three = $request->file('image_three');
            $imageName = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            
            Image::make($image_three)->resize(270,270)->save($imagePath.$imageName);
            $pro->image_three = $imagePath.$imageName;
        }
        
        $pro->update([

        "category_id" => $request->category_id,
        'brand_id' => $request->brand_id,
        'product_name' => $request->product_name,
        'product_slug' => strtolower(str_replace(' ', '-', $request->product_slug)),
        'product_code' => $request->product_code,
        'product_quantity' => $request->product_quantity,
        'short_description' => $request->short_description,
        'long_description' => $request->long_description,
        'price' => $request->price,
        'status' => $request->status,
        'image_one' => $pro->image_one,
        'image_two' => $pro->image_two,
        'image_three' => $pro->image_three,
        'updated_at' => Carbon::now(),

        ]);
        return redirect()->route('manage.product')->with('msg', 'Product Updated Successsfully!');
    }

    public function updateImage(Request $request){
        $product_id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;

        if ($request->has('image_one')) {
            unlink($old_one);
            $image_one = $request->file('image_one');
            $imagePath='public/backend/uploadImages/';
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 666, true);
            }
            $imageName = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();;
            Image::make($image_one)->resize(270,270)->save($imagePath.$imageName);
            $imageUrl1 = $imagePath.$imageName;

            Product::findorFail($product_id)->update([

                'image_one' => $imageUrl1,
                'updated_at' => Carbon::now(),

            ]);

            return redirect()->route('manage.product')->with('msg', 'Image Updated Successsfully!');
        }
    }
    public function destroy($product_id){
        $image = Product::findorFail($product_id);
        $img_one =$image->image_one;
        $img_two =$image->image_two;
        $img_three =$image->image_three;
        unlink($img_one);
        unlink($img_two);
        unlink($img_three);

        Product::findorFail($product_id)->delete();

        return redirect()->back()->with('dlt', 'Product Deleted Successsfully!');
    }

    public function inactive($id){
        Product::find($id)->update(['status'=>0]);
        return Redirect()->back()->with('dlt', 'Product Inactivated Successsfully!');
    }

    public function active($id){
        Product::find($id)->update(['status'=>1]);
        return Redirect()->back()->with('msg', 'Product Activated Successsfully!');
    }

    
}
