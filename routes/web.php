<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontendController@index');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');




//========================Admin===============================

//Category Section
Route::get('admin_categories', 'CategoryController@index')->name('category.add');
Route::post('admin_categories/store', 'CategoryController@store')->name('category.store');
Route::get('admin_categories/edit/{id}', 'CategoryController@edit');
Route::post('admin_categories/update/{id}', 'CategoryController@update')->name('category.update');
Route::delete('admin_categories/delete/{id}', 'CategoryController@delete');
Route::get('admin_categories/inactive/{id}', 'CategoryController@inactive');
Route::get('admin_categories/active/{id}', 'CategoryController@active');
 

 //Brand Section
Route::get('admin_brand', 'BrandController@index')->name('brand');
Route::post('admin_brand/store', 'BrandController@store')->name('brand.store');
Route::get('admin_brand/edit/{id}', 'BrandController@edit');
Route::post('admin_brand/update/{id}', 'BrandController@update')->name('brand.update');
Route::delete('admin_brand/delete/{id}', 'BrandController@delete');
Route::get('admin_brand/inactive/{id}', 'BrandController@inactive');
Route::get('admin_brand/active/{id}', 'BrandController@active');
 

 //Products Section

Route::get('admin_product/add', 'ProductController@addProduct')->name('add.product');
Route::post('admin_product/store', 'ProductController@store')->name('store.product');
Route::get('admin_product/manage', 'ProductController@manageProduct')->name('manage.product');
Route::get('admin_product/edit/{id}', 'ProductController@editProduct');
Route::post('admin_product/update/{id}', 'ProductController@updateProduct')->name('update.product');
Route::post('admin_product/update/image', 'ProductController@updateProduct')->name('update.image');

Route::get('admin_product/inactive/{id}', 'ProductController@inactive');
Route::get('admin_product/active/{id}', 'ProductController@active');
Route::delete('admin_product/delete/{id}', 'ProductController@destroy');


//===================Cart===============

Route::post('add/to-cart/{product_id}', 'CartController@addToCart');
Route::get('cart', 'CartController@cartPage');
Route::get('cart/destroy/{id}', 'CartController@destroy');
Route::post('cart/quantity/update/{id}', 'CartController@quantityUpdate');
Route::post('admin_coupon/apply', 'CartController@applyCoupon');
Route::get('coupon/destroy', 'CartController@couponDestroy');

//===================wishlist===============

Route::get('add/to-wishlist/{product_id}', 'WishlistController@addToWishlist');
Route::get('wishlist/', 'WishlistController@wishPage');
Route::get('wishlist/destroy/{id}', 'WishlistController@destroy');

//==============Coupon====================
Route::get('admin_coupon', 'CouponController@index')->name('coupon');
Route::post('admin_coupon/store', 'CouponController@store')->name('coupon.store');
Route::get('admin_coupon/edit/{id}', 'CouponController@edit');
Route::post('admin_coupon/update/{id}', 'CouponController@update')->name('coupon.update');
Route::delete('admin_coupon/delete/{id}', 'CouponController@delete');
Route::get('admin_coupon/inactive/{id}', 'CouponController@inactive');
Route::get('admin_coupon/active/{id}', 'CouponController@active');


//==============OrderItems====================
Route::get('admin_orders', 'OrderItemController@index')->name('orders');
Route::get('admin_orders/view/{id}', 'OrderItemController@viewOrder');
Route::get('admin_orders/invoice/{id}', 'OrderItemController@invoiceOrder')->name('invoice');



//==============Product Details============================
Route::get('product/details/{id}', 'FrontendController@productDetail');

//==============CheckoutController============================
Route::get('checkout', 'CheckoutController@index');
Route::post('place/order', 'OrderController@storeOrder')->name('place_order');
Route::get('order/success', 'OrderController@orderSuccess');
Route::get('user/order', 'UserController@order')->name('user.order');
Route::get('user/order-view/{id}', 'UserController@orderView');


//=================Shop Page===================
Route::get('shop', 'FrontendController@shopPage')->name('shop.page');

//=================Category Wise Product===================
Route::get('category/product-show/{id}', 'FrontendController@catWiseProduct');

//=================Searched Product===================
Route::get('search', 'FrontendController@searchProduct')->name('search');



// Route::get('invoice/{order_id}', 'InvoiceController@invoice')->name('invoice');