<?php

use App\Http\Controllers\Frontend\IndexController;
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



// Frontend Routes


Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('main');
Route::get('/product-category/{slug}',[IndexController::class,'productCategory'])->name('product.category');

//End


Auth::routes();

//Dashboard Routes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','midlleware'=>'auth'],function(){
    Route::get('/',[App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

    //Banner 
    Route::resource('banner',App\Http\Controllers\BannerController::class);
     //Categories
    Route::resource('category',App\Http\Controllers\CategoryController::class);
    Route::post('category/{id}/child',[App\Http\Controllers\CategoryController::class,'getChildCategory']);

    //Brands
    Route::resource('brand',App\Http\Controllers\BrandController::class);
    
    //Products
    Route::resource('product',App\Http\Controllers\ProductController::class);

    //Users
    Route::resource('user',App\Http\Controllers\UserController::class);
    
    


});