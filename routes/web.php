<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ShopcartController;

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


Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('homepage');
Route::get('/aboutus',[\App\Http\Controllers\HomeController::class,'aboutus'])->name('aboutus');
Route::get('/faq',[\App\Http\Controllers\HomeController::class,'faq'])->name('faq');
Route::get('/references',[\App\Http\Controllers\HomeController::class,'references'])->name('references');
Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact'])->name('contact');
Route::get('/product/{id}/{slug}',[\App\Http\Controllers\HomeController::class,'product'])->name('product');
Route::get('/categoryproducts/{id}/{slug}',[\App\Http\Controllers\HomeController::class,'categoryproducts'])->name('categoryproducts');

Route::get('/addtocart/{id}',[\App\Http\Controllers\HomeController::class,'addtocart'])->whereNumber('id')->name('addtocart');

  


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


#owner
Route::get('/orderwait',[\App\Http\Controllers\HomeController::class,'orderwait'])->name('orderwait');
Route::get('/orderwaitshow/{id}',[\App\Http\Controllers\HomeController::class,'orderwaitshow'])->name('orderwaitshow');
Route::get('/orderwaitshipping/{id}',[\App\Http\Controllers\HomeController::class,'orderwaitshipping'])->name('orderwaitshipping');


//Admin

Route::middleware('auth')->prefix('admin')->group(function()
{
    Route::middleware('admin')->group(function(){

        Route::get('login',[HomeController::class,'login'])->name('admin_login');
        Route::get('logout',[HomeController::class,'logout'])->name('admin_logout');
        Route::get('/',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin_home');

        Route::get('/category',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin_category');
        Route::get('/category/add',[\App\Http\Controllers\Admin\CategoryController::class,'add'])->name('admin_category_add');
        Route::post('/category/create',[\App\Http\Controllers\Admin\CategoryController::class,'create'])->name('admin_category_create');
    
        Route::post('/category/update',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin_category_update');
        Route::get('/category/delete/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('admin_category_delete');
        Route::get('/category/show',[\App\Http\Controllers\Admin\CategoryController::class,'show'])->name('admin_category_show');
    
    
        Route::prefix('product')->group(function(){
            Route::get('/',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin_products');
            Route::get('/create',[\App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin_products_create');
            Route::post('/store',[\App\Http\Controllers\Admin\ProductController::class,'store'])->name('admin_products_store');
            Route::get('/edit/{id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('admin_products_edit');
            Route::post('/update/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('admin_products_update');
            Route::get('/delete/{id}',[\App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('admin_products_delete');
            Route::get('/show',[\App\Http\Controllers\Admin\ProductController::class,'show'])->name('admin_products_show');
        });
    
        //image gallery
    
        Route::prefix('image')->group(function(){
            Route::get('create/{product_id}', [\App\Http\Controllers\Admin\ImageController::class,'create'])->name('admin_image_add');
            Route::post('store/{product_id}', [\App\Http\Controllers\Admin\ImageController::class,'store'])->name('admin_image_store');
            Route::get('delete/{id}/{product_id}', [\App\Http\Controllers\Admin\ImageController::class,'destroy'])->name('admin_image_delete');
            Route::get('show', [\App\Http\Controllers\Admin\ImageController::class,'show'])->name('admin_image_show');
        });
    // setting
    Route::get('/setting',[\App\Http\Controllers\Admin\SettingController::class,'index'])->name('admin_setting');
    Route::post('/setting/update',[\App\Http\Controllers\Admin\SettingController::class,'update'])->name('admin_setting_update');
    
    
    
    #Order
    Route::prefix('order')->group(function(){
        Route::get('/',[AdminOrderController::class,'index'])->name('admin_orders');
        Route::get('/new',[AdminOrderController::class,'indexnew'])->name('admin_orders_new');
        Route::get('/accept',[AdminOrderController::class,'indexaccept'])->name('admin_orders_accept');
        Route::get('/shipping',[AdminOrderController::class,'indexshipping'])->name('admin_orders_shipping');
        Route::get('/completed',[AdminOrderController::class,'indexcompleted'])->name('admin_orders_completed');
        Route::post('/create',[AdminOrderController::class,'create'])->name('admin_order_add');
        Route::post('/store',[AdminOrderController::class,'store'])->name('admin_order_store');
        Route::get('/edit/{id}',[AdminOrderController::class,'edit'])->name('admin_order_edit');
        Route::post('/update/{id}',[AdminOrderController::class,'update'])->name('admin_order_update');
        Route::get('/delete/{id}',[AdminOrderController::class,'destroy'])->name('admin_order_delete');
        Route::get('/show/{id}',[AdminOrderController::class,'show'])->name('admin_order_show');
    });
    
    });
  
});

Route::middleware('auth')->prefix('myaccount')->namespace('myaccount')->group(function()
{
    Route::get('/',[\App\Http\Controllers\UserController::class,'index'])->name('myprofile');
    




});

Route::middleware('auth')->prefix('user')->namespace('user')->group(function()
{
    Route::get('/profile',[\App\Http\Controllers\UserController::class,'index'])->name('profile.show');



    
    Route::prefix('product')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('user_products');
        Route::get('/create',[ProductController::class,'create'])->name('user_products_create');
        Route::post('/store',[ProductController::class,'store'])->name('user_products_store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('user_products_edit');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('user_products_update');
        Route::get('/delete/{id}',[ProductController::class,'destroy'])->name('user_products_delete');
        Route::get('/show',[ProductController::class,'show'])->name('user_products_show');
    });

    //image gallery

    Route::prefix('image')->group(function(){
        Route::get('create/{product_id}', [ImageController::class,'create'])->name('user_image_add');
        Route::post('store/{product_id}', [ImageController::class,'store'])->name('user_image_store');
        Route::get('delete/{id}/{product_id}', [ImageController::class,'destroy'])->name('user_image_delete');
        Route::get('show', [ImageController::class,'show'])->name('user_image_show');
    });



#Shopcart
    Route::prefix('shopcart')->group(function(){
        Route::get('/',[ShopcartController::class,'index'])->name('user_shopcart');
        Route::post('/store/{id}',[ShopcartController::class,'store'])->name('user_shopcart_add');
        Route::post('/update/{id}',[ShopcartController::class,'update'])->name('user_shopcart_update');
        Route::get('/delete/{id}',[ShopcartController::class,'destroy'])->name('user_shopcart_delete');
    });

#Order
    Route::prefix('order')->group(function(){
        Route::get('/',[OrderController::class,'index'])->name('user_orders');
        Route::post('/create',[OrderController::class,'create'])->name('user_order_add');
        Route::post('/store',[OrderController::class,'store'])->name('user_order_store');
        Route::get('/edit/{id}',[OrderController::class,'edit'])->name('user_order_edit');
        Route::post('/update/{id}',[OrderController::class,'update'])->name('user_order_update');
        Route::get('/delete/{id}',[OrderController::class,'destroy'])->name('user_order_delete');
        Route::get('/show/{id}',[OrderController::class,'show'])->name('user_order_show');
    });



   
});


Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/admin/logincheck',[HomeController::class,'logincheck'])->name('admin_logincheck');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');



Route::get('/home',[HomeController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


