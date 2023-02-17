<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DemoController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\ProductController;

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

Route::get('admin/category',[CategoryController::class,'index']);
Route::get('admin/category/add',[CategoryController::class,'add']);
Route::post('admin/category/add',[CategoryController::class,'addData'])->name('category.add');
Route::get('admin/category/delete/{id}',[CategoryController::class,'deleteData']);
Route::get('admin/category/edit/{id}',[CategoryController::class,'editData']);
Route::post('admin/category/update',[CategoryController::class,'updateData'])->name('category.update');


Route::get('admin/coupon',[CouponController::class,'index']);
Route::get('admin/coupon/add',[CouponController::class,'add']);
Route::post('admin/coupon/add',[CouponController::class,'addData'])->name('coupon.add');
Route::get('admin/coupon/delete/{id}',[CouponController::class,'deleteData']);
Route::get('admin/coupon/edit/{id}',[CouponController::class,'editData']);
Route::post('admin/coupon/update',[CouponController::class,'updateData'])->name('coupon.update');
Route::get('admin/coupon/status/deactive/{id}',[CouponController::class,'statusDeactive']);
Route::get('admin/coupon/status/active/{id}',[CouponController::class,'statusactive']);

Route::get('admin/size',[SizeController::class,'index']);
Route::get('admin/size/add',[SizeController::class,'add']);
Route::post('admin/size/add',[SizeController::class,'addData'])->name('size.add');
Route::get('admin/size/delete/{id}',[SizeController::class,'deleteData']);
Route::get('admin/size/edit/{id}',[SizeController::class,'editData']);
Route::post('admin/size/update',[SizeController::class,'updateData'])->name('size.update');
Route::get('admin/size/status/deactive/{id}',[SizeController::class,'statusDeactive']);
Route::get('admin/size/status/active/{id}',[SizeController::class,'statusactive']);

Route::get('admin/color',[ColorController::class,'index']);
Route::get('admin/color/add',[ColorController::class,'add']);
Route::post('admin/color/add',[ColorController::class,'addData'])->name('color.add');
Route::get('admin/color/delete/{id}',[ColorController::class,'deleteData']);
Route::get('admin/color/edit/{id}',[ColorController::class,'editData']);
Route::post('admin/color/update',[ColorController::class,'updateData'])->name('color.update');
Route::get('admin/color/status/deactive/{id}',[ColorController::class,'statusDeactive']);
Route::get('admin/color/status/active/{id}',[ColorController::class,'statusactive']);

Route::get('admin/product',[ProductController::class,'index']);
Route::get('admin/product/add',[ProductController::class,'add']);
Route::post('admin/product/add',[ProductController::class,'addData'])->name('product.add');
Route::get('admin/product/delete/{id}',[ProductController::class,'deleteData']);
Route::get('admin/product/edit/{id}',[ProductController::class,'editData']);
Route::post('admin/product/update',[ProductController::class,'updateData'])->name('product.update');
Route::get('admin/product/status/deactive/{id}',[ProductController::class,'statusDeactive']);
Route::get('admin/product/status/active/{id}',[ProductController::class,'statusactive']);
Route::get('admin/product_attr/delete/{pid}/{paid}',[ProductController::class,'productattrdelete']);
