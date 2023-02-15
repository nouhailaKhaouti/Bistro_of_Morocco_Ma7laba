<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function ()
{
    Route::get('/profile', [HomeController::class,'Profile'])->name('profile');
    Route::post('/editprofile', [HomeController::class,'editprofile']);
    Route::post('/editpassword', [HomeController::class,'UpdatePassword'])->name('password');
    Route::get('/logOut', [HomeController::class,'logout'])->name('logOut');

});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/user', [HomeController::class,'index']);
    Route::get('/change/{id}',[HomeController::class,'change_role'])->name('role');
});

Route::middleware(['auth','subadmin'])->group(function ()
{
// ::::::::::::::::::::::product:::::::::::::::::::::::
Route::get('/product', [ProductController::class,'Product']);
Route::post('/product_create', [ProductController::class,'Product_create']);
Route::post('/product_update', [ProductController::class,'Product_update']);
Route::get('delet/{id}',[ProductController::class,'destroy'])->name('deleting');

// ::::::::::::::::::::::category:::::::::::::::::::::::
Route::get('/category', [categoryController::class,'category']);
Route::post('/category_create', [categoryController::class,'category_create']);
Route::post('/category_update/{id}', [categoryController::class,'category_update']);
Route::get('/category_delete/{id}',[categoryController::class,'category_delete']);

});



