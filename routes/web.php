<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategory;
use App\Http\Controllers\ProductDetail;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/category/{slug}/{id}',[ProductCategory::class,'index'])->name('category.product');
Route::get('/product/detail/{id}',[ProductDetail::class,'index'])->name('product.detail');
Route::get('product/add-to-cart/{id}',[HomeController::class,'addToCart'])->name('addToCart');
Route::get('product/showcart',[HomeController::class,'showCart'])->name('showCart');
Route::get('product/update-cart',[HomeController::class,'updateCart'])->name('updateCart');
Route::get('product/delete-cart',[HomeController::class,'deleteCart'])->name('deleteCart');