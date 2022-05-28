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
Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'dashboard'])->name('dashboard');
Route::get('category/create',[\App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
