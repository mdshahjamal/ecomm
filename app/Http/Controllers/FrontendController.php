<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontendController extends Controller
{
    public function index(){
    	$products = Product::where('status',1)->latest()->get();
        $latest_p = Product::where('status',1)->latest()->limit(3)->get();
    	$categories = Category::where('status',1)->latest()->get();
    	return view('frontend.index',compact('products', 'categories','latest_p'));
    }

    public function productDetail($id){
    	$product = Product::findOrFail($id);
    	$category_id = $product->category_id;
    	// dd($category_id);
    	$related_p = Product::where('category_id',$category_id)->where('id', '!=', $id)->latest()->get();
    	return view('frontend.product_details',compact('product', 'related_p'));
    }



    public function shopPage(){
        $products = Product::latest()->get();
        $productpaginate = Product::latest()->paginate(9);
        $categories = Category::where('status',1)->latest()->get();
        return view('frontend.shop',compact('products','productpaginate', 'categories'));
    }

    public function catWiseProduct($cat_id){
        $products = Product::where('id',$cat_id)->latest()->paginate(9);
        $categories = Category::where('status',1)->latest()->get();
        return view('frontend.cat-product',compact('products','categories'));
    }
//==============================Searched Products========================================
    public function searchProduct(Request $request){
        $search = $request->search;
        $searchProducts = product::orWhere('product_name','like','%'.$search.'%')
            ->orWhere('short_description','like','%'.$search.'%')
            ->orWhere('long_description','like','%'.$search.'%')
            ->orWhere('price','like','%'.$search.'%')
            ->paginate(8);
        return view('frontend.search-product',compact('searchProducts','search'));
    }

    
}
