<?php

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
//Guest Routes
Route::get('/', function () {
    return view('frontend.index');
});

//User Routes
Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin Routes
Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('categories',[\App\Http\Controllers\CategoryController::class,'index'])->name('category.index');
    Route::prefix('category')->group(function(){
        Route::get('create',[\App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
        Route::get('edit/{category}',[\App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
        Route::post('update',[\App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
        Route::post('store',[\App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
        Route::get('delete/{category}',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('category.delete');
    });
});

