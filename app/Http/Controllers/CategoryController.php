<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){

    	$categories = Category::latest()->paginate(5);
    	return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request){
    	$request->validate([
    		'category_name' => 'required|unique:categories,category_name'

    	]);
    	Category::insert([
    		'category_name' => $request->category_name,
    		'created_at' => Carbon::now()

    	]);

    	return Redirect()->back()->with('msg', 'Category Inserted Successsfully!');
    }

    public function edit($id){
    	$categories = Category::find($id);
    	return view('admin.category.edit', compact('categories'));
    }

    public function update(Request $request, $id){
    	$request->validate([
    		'category_name' => 'required|unique:categories,category_name'

    	]);
    	$categories = Category::find($id)->update([
    		'category_name' => $request->category_name,
    		'updated_at' => Carbon::now()

    	]);

    	return Redirect()->route('category.add')->with('msg', 'Category Updated Successsfully!');
    }

    public function delete($id){
    	$category = Category::find($id)->delete();
    	return Redirect()->back()->with('dlt', 'Category Deleted Successsfully!');
    }

    public function inactive($id){
    	Category::find($id)->update(['status'=>0]);
    	return Redirect()->back()->with('dlt', 'Category Inactivated Successsfully!');
    }

    public function active($id){
    	Category::find($id)->update(['status'=>1]);
    	return Redirect()->back()->with('msg', 'Category Activated Successsfully!');
    }

    
}
