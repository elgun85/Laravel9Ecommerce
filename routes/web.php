<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Frontend\WishlistController;

use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\FrontendController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

                            /*         Frontend      */

Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/category',[FrontendController::class,'category'])->name('category');

Route::middleware(['auth'])->group(function ()
{
    Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlistIndex');

});

Route::get('{category_slug}',[FrontendController::class,'product'])->name('product');
Route::get('category/{category_slug}/{product_slug}',[FrontendController::class,'productView'])->name('productView');






                             /*         Backend      */
//Route::prefix('back')->middleware(['auth','isAdmin'])->group(function ()
Route::prefix('back')->middleware(['auth','isAdmin'])->group(function ()
{
    //Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('category',CategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('product',ProductController::class);
    Route::resource('colors',ColorsController::class);
    Route::resource('slider',SliderController::class);




    Route::get('CategoryDel/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('BrandDel/{id}',[BrandController::class,'delete'])->name('brand.delete');
    Route::get('ProductDel/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('SliderDel/{id}',[SliderController::class,'delete'])->name('slider.delete');
    Route::get('ProductImageDel/{id}',[ProductController::class,'ProductImageDel'])->name('product.ProductImageDel');

    Route::any('updateProdColorQty/{id}',[ProductController::class,'updateProdColorQty'])->name('product.updateProdColorQty');
    Route::get('deleteProdColorQty/{id}',[ProductController::class,'deleteProdColorQty'])->name('product.deleteProdColorQty');
    Route::get('ColorDel/{id}',[ColorsController::class,'delete'])->name('colors.delete');

});
