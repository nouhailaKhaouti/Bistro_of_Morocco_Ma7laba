<?php

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


});
Route::middleware(['auth','admin'])->group(function ()
{
    
// ::::::::::::::::::::::user::::::::::::::::::::::::::
Route::get('/user', [HomeController::class,'User']);
Route::get('/change_role/{$id}', [HomeController::class,'User_role'])->name('role');
// ::::::::::::::::::::::product:::::::::::::::::::::::
Route::get('/product', [ProductController::class,'Product']);
Route::post('/product_create', [ProductController::class,'Product_create']);
Route::post('/product_update', [ProductController::class,'Product_update']);
Route::get('delet/{id}',[ProductController::class,'destroy'])->name('deleting');

// ::::::::::::::::::::::category:::::::::::::::::::::::
Route::get('/category', [CategoryController::class,'category']);
Route::post('/category_create', [CategoryController::class,'category_create']);
Route::post('/category_update/{id}', [CategoryController::class,'category_update']);
Route::get('/category_delete/{id}',[CategoryController::class,'category_delete']);
});

