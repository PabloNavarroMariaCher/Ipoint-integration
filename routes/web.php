<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductoSimpleController;
use App\Http\Controllers\ProductoConfigurableController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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