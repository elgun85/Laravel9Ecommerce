<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;


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
});
