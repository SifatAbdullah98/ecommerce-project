<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
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
Route::get('login', [AuthController::class,'index'])->name('login');
Route::post('login', [AuthController::class,'login'])->name('login');
Route::get('admin', [AdminController::class,'index']);
Route::get('product/{id}', [FrontController::class,'product']);
Route::get('registration', [FrontCustomerController::class,'registration']);
Route::post('registration_process', [FrontCustomerController::class,'registration_process'])->name('registration.registration_process');
Route::get('category/{id}', [FrontController::class,'category']);

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

    //customer route
    Route::get('admin/customer', [CustomerController::class,'index']);
    Route::get('admin/customer/customer_details/{id}', [CustomerController::class,'show']);
    Route::get('admin/customer/status/{status}/{id}', [CustomerController::class,'status']);

    Route::get('admin/logout', function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        return redirect('admin');
    });
});