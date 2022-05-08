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

// Route::get('/', [ HomeController::class, 'home'])->name('home');
Route::get('/pressOnCart', [HomeController::class, 'pressOnCart'])->name('pressOnCart');
Route::get('/product_details', [HomeController::class, 'product_details'])->name('product_details');
Route::group(['prefix' => '{vendor_uuid}', 'middleware' => ['apiCheckVendor']], function () {
    Route::get('branch/{table_id}', [App\Http\Controllers\MenuBranchController::class, 'branch'])->name('branch');

    Route::get('{language}/menu/{category_id}/{table_id}', [App\Http\Controllers\MenuBranchController::class, 'productCategoryBranch'])->name('productCategoryBranch');
    Route::get('showproduct/{product_id}/{table_id}', [App\Http\Controllers\MenuBranchController::class, 'product'])->name('showproductBranch');
    Route::post('changeQuantity', 'OrderBasketController@changeQuantity')->name('changeQuantity');
    Route::post('add-to-basket/{product_id}', [App\Http\Controllers\OrderBasketController::class, 'addToBasket'])->name('addToBasket');
    Route::post('submitOrder', 'OrderBasketController@submitOrder')->name('submitOrder');
    Route::post('pay-visa', 'OrderBasketController@submitOrderOnline')->name('pay.visa');
    Route::get('payment/status', 'OrderBasketController@paymentStatus')->name('showProductFullInfoMenu');
    Route::post('remove-from-basket', 'OrderBasketController@removeFromBasket')->name('removeFromBasket');
    Route::post('changeQuantity', 'OrderBasketController@changeQuantity')->name('changeQuantity');
    Route::get('showProductFullInfo', 'OrderBasketController@showProductFullInfo')->name('showProductFullInfo');
    Route::post('coupon-check', 'OrderBasketController@checkCoupon')->name('coupon.check');
    Route::get('checkout', [App\Http\Controllers\MenuBranchController::class, 'checkout'])->name('checkout');
    Route::get('track_order', [App\Http\Controllers\MenuBranchController::class, 'track_order'])->name('track_order');
    Route::get('congratulations', [App\Http\Controllers\MenuBranchController::class, 'congratulations'])->name('congratulations');
    Route::get('loadProduct/{table_id}', [App\Http\Controllers\MenuBranchController::class, 'loadProduct'])->name('loadProduct');

});
