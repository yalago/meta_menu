<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [ HomeController::class, 'home'])->name('home');
Route::get('/pressOnCart', [ HomeController::class, 'pressOnCart'])->name('pressOnCart');
Route::get('/product_details', [HomeController::class, 'product_details'])->name('product_details');
