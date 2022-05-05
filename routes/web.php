<?php
use App\Http\Controllers\HomeController;

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



//Admin

Route::middleware('auth')->prefix('admin')->group(function()
{
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


});

Route::middleware('auth')->prefix('myaccount')->namespace('myaccount')->group(function()
{
    Route::get('/',[\App\Http\Controllers\UserController::class,'index'])->name('myprofile');

});

Route::middleware('auth')->prefix('user')->namespace('user')->group(function()
{
    Route::get('/profile',[\App\Http\Controllers\UserController::class,'index'])->name('profile.show');

});


Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('admin/login',[HomeController::class,'login'])->name('admin_login');
Route::post('/admin/logincheck',[HomeController::class,'logincheck'])->name('admin_logincheck');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/admin/logout',[HomeController::class,'logout'])->name('admin_logout');


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


