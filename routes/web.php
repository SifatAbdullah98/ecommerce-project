<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AreaController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [FrontController::class,'index']);
Route::get('product/{id}', [FrontController::class,'product']);
Route::get('registration', [FrontCustomerController::class,'registration']);
Route::post('registration_process', [FrontCustomerController::class,'registration_process'])->name('registration.registration_process');
Route::get('category/{id}', [FrontController::class,'category']);
Route::get('category_product/{id}', [FrontController::class,'category_product']);
Route::get('customer_order_details', [CustomerController::class,'customer_order_details']);
Route::get('show_cart', [CartController::class,'show_cart'])->name('show_cart');
Route::post('add_to_cart', [CartController::class,'add_to_cart'])->name('add_to_cart');
Route::post('add_review', [ReviewController::class,'add_review'])->name('add_review');
Route::get('remove_from_cart/{id}', [CartController::class,'remove_from_cart']);
Route::get('checkout', [CartController::class,'checkout']);
Route::post('order_now', [CartController::class,'order_now'])->name('order_now');

Route::get('login_view', [CustomerController::class,'login_view']);
Route::post('login', [CustomerController::class,'login'])->name('login');
Route::get('register_view', [FrontController::class,'register_view']);
Route::post('register', [FrontController::class,'register'])->name('register');
Route::get('logout', function(){
    session()->forget('CUSTOMER_LOGIN');
    session()->forget('CUSTOMER_ID');
    return redirect('/');
});


Route::get('admin', [AdminController::class,'index']);
Route::post('admin/auth', [AdminController::class,'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){
    //category route
    Route::get('admin/dashboard', [AdminController::class,'dashboard']);
    Route::get('admin/category', [CategoryController::class,'index']);
    Route::get('admin/category/manage_category', [CategoryController::class,'manage_category']);
    Route::get('admin/category/manage_category/{id}', [CategoryController::class,'manage_category']);
    Route::post('admin/category/manage_category_process', [CategoryController::class,'manage_category_process'])->name('manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class,'delete']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class,'status']);
    Route::get('admin/category/home/{home}/{id}', [CategoryController::class,'home']);

    //voucher route
    Route::get('admin/voucher', [VoucherController::class,'index']);
    Route::get('admin/voucher/manage_voucher', [VoucherController::class,'manage_voucher']);
    Route::get('admin/voucher/manage_voucher/{id}', [VoucherController::class,'manage_voucher']);
    Route::post('admin/voucher/manage_voucher_process', [VoucherController::class,'manage_voucher_process'])->name('manage_voucher_process');
    Route::get('admin/voucher/delete/{id}', [VoucherController::class,'delete']);
    Route::get('admin/voucher/status/{status}/{id}', [VoucherController::class,'status']);
    Route::get('admin/voucher/type/{type}/{id}', [VoucherController::class,'type']);
    Route::get('admin/voucher/is_one_time/{is_one_time}/{id}', [VoucherController::class,'is_one_time']);

    //product route
    Route::get('admin/product', [ProductController::class,'index']);
    Route::get('admin/product/manage_product', [productController::class,'manage_product']);
    Route::get('admin/product/manage_product/{id}', [productController::class,'manage_product']);
    Route::post('admin/product/manage_product_process', [productController::class,'manage_product_process'])->name('manage_product_process');
    Route::get('admin/product/delete/{id}', [productController::class,'delete']);
    Route::get('admin/product/is_featured/{is_featured}/{id}', [productController::class,'is_featured']);
    Route::get('admin/product/is_discounted/{is_discounted}/{id}', [productController::class,'is_discounted']);
    Route::get('admin/product/is_trending/{is_trending}/{id}', [productController::class,'is_trending']);
    Route::get('admin/product/status/{status}/{id}', [productController::class,'status']);

    //size route
    Route::get('admin/size', [SizeController::class,'index']);
    Route::get('admin/size/manage_size', [SizeController::class,'manage_size']);
    Route::get('admin/size/manage_size/{id}', [SizeController::class,'manage_size']);
    Route::post('admin/size/manage_size_process', [SizeController::class,'manage_size_process'])->name('manage_size_process');
    Route::get('admin/size/delete/{id}', [SizeController::class,'delete']);
    Route::get('admin/size/status/{status}/{id}', [SizeController::class,'status']);

    //district route
    Route::get('admin/district', [DistrictController::class,'index']);
    Route::get('admin/district/manage_district', [DistrictController::class,'manage_district']);
    Route::get('admin/district/manage_district/{id}', [DistrictController::class,'manage_district']);
    Route::post('admin/district/manage_district_process', [DistrictController::class,'manage_district_process'])->name('manage_district_process');
    Route::get('admin/district/delete/{id}', [DistrictController::class,'delete']);
    Route::get('admin/district/status/{status}/{id}', [DistrictController::class,'status']);

    //zone route
    Route::get('admin/zone', [ZoneController::class,'index']);
    Route::get('admin/zone/manage_zone', [ZoneController::class,'manage_zone']);
    Route::get('admin/zone/manage_zone/{id}', [ZoneController::class,'manage_zone']);
    Route::post('admin/zone/manage_zone_process', [ZoneController::class,'manage_zone_process'])->name('manage_zone_process');
    Route::get('admin/zone/delete/{id}', [ZoneController::class,'delete']);
    Route::get('admin/zone/status/{status}/{id}', [ZoneController::class,'status']);

    //area route
    Route::get('admin/area', [AreaController::class,'index']);
    Route::get('admin/area/manage_area', [AreaController::class,'manage_area']);
    Route::get('admin/area/manage_area/{id}', [AreaController::class,'manage_area']);
    Route::post('admin/area/manage_area_process', [AreaController::class,'manage_area_process'])->name('manage_area_process');
    Route::get('admin/area/delete/{id}', [AreaController::class,'delete']);
    Route::get('admin/area/status/{status}/{id}', [AreaController::class,'status']);

    //customer route
    Route::get('admin/customer', [CustomerController::class,'index']);
    Route::get('admin/customer/customer_details/{id}', [CustomerController::class,'show']);
    Route::get('admin/customer/status/{status}/{id}', [CustomerController::class,'status']);
    //order route
    Route::get('admin/order', [OrderController::class,'index']);
    Route::get('admin/order/order_status/{order_status}/{id}', [OrderController::class,'order_status']);
    Route::get('admin/order/delivery_status/{delivery_status}/{id}', [OrderController::class,'delivery_status']);
    Route::get('admin/order/delete/{id}', [OrderController::class,'delete']);

    //review route
    Route::get('admin/review', [ReviewController::class,'index']);
    Route::get('admin/review/review_status/{review_status}/{id}', [ReviewController::class,'review_status']);
    Route::get('admin/review/delete/{id}', [ReviewController::class,'delete']);

    Route::get('admin/logout', function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        return redirect('admin');
    });
});