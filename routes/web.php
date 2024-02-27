<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductoSimpleController;
use App\Http\Controllers\ProductoConfigurableController;
use App\Http\Controllers\datatableController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/sources',[SourceController::class,'index'])->name('sources.index');
Route::resource('/stocks',StockController::class);
Route::resource('/productoconfigurable',ProductoConfigurableController::class);
Route::resource('/productosimple',ProductoSimpleController::class);
Route::get('datatable/productoconfigurable',[datatableController::class,'allproductoconfigurable'])->name('datatable.productoconfigurable');
Route::get('datatable/productosimple',[datatableController::class,'allproductosimple'])->name('datatable.productosimple');
