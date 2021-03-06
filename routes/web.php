<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\frontend\FrontendController as FrontendFrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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
//     return view('frontend.index');
// });



//frontend
Route::get('/',[FrontendFrontendController::class,'index']);
Route::get('category',[FrontendFrontendController::class,'category']);
Route::get('view-category/{slug}',[FrontendFrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendFrontendController::class,'productview']);
//frontend

Auth::routes();

// middleware
Route::middleware(['auth'])->group(function(){
Route::post('add-to-cart',[CartController::class,'addProduct']);
});
// middleware
// 


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[FrontendController::class,'index']);
    Route::get('categories',[CategoryController::class,'index']);
    Route::get('add-category',[CategoryController::class,'add']);
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::post('insert-category',[CategoryController::class,'insert']);
    Route::post('update-category/{id}',[CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class,'delete']);
    
    // products
    Route::get('products',[ProductController::class,'index']);
    Route::get('add-product',[ProductController::class,'add']);
    Route::post('insert-product',[ProductController::class,'insert']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::post('update-product/{id}',[ProductController::class,'update']);
    Route::get('delete-product/{id}',[ProductController::class,'delete']);
    //products 
});
