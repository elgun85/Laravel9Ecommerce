<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|->middleware(['auth:sanctum','isAdmin'])
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'back'],function ()
{
    Route::post('/dashboard_test',[DashboardController::class,'index'])->name('dashboard');
});
*/

Route::prefix('back')->middleware(['auth','isAdmin'])->group(function ()
{
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('category',\App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('product',ProductController::class);




    Route::get('CategoryDel/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('BrandDel/{id}',[BrandController::class,'delete'])->name('brand.delete');
    Route::get('ProductDel/{id}',[ProductController::class,'delete'])->name('product.delete');
});
