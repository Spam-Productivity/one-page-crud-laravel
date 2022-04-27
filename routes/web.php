<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', [CustomerController::class, 'index'])->name('index');
Route::post('/store', [CustomerController::class, 'store'])->name('store')->middleware('guest');
Route::post('/update/{customer:username}', [CustomerController::class, 'update'])->name('update')->middleware('guest');
Route::post('/delete/{customer:username}', [CustomerController::class, 'destroy'])->name('delete')->middleware('guest');
Route::get('/show/{customer:username}', [CustomerController::class, 'show'])->name('show')->middleware('guest');
