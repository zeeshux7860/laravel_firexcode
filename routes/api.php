<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// admin login
Route::post('auth/login', 'API\AdminController@login');


// phone auth
Route::post('phone/auth/login', 'API\PhoneAuthController@add');
Route::post('phone/auth/verify', 'API\PhoneAuthController@phoneVerify');
Route::post('phone/auth/create', 'API\PhoneAuthController@create');



// banner
Route::post('add/banner/request', 'API\BannerController@add');
Route::post('show/banner/request', 'API\BannerController@show');
Route::post('add/banner/vertical/request', 'API\BannerVerticalController@add');
Route::post('show/banner/vertical/request', 'API\BannerVerticalController@show');


// category route
Route::post('add/category/request', 'API\CategoryController@add');
Route::post('add/sub/category/request', 'API\SubCategoryController@add');
Route::post('show/category/request', 'API\CategoryController@show');
Route::post('show/sub/category/request', 'API\SubCategoryController@show');

// products route
Route::post('add/product/request', 'API\ProductsController@add');
Route::post('add/product/image/request', 'API\ProductsImageController@add');
Route::post('add/product/price/request', 'API\ProductsPriceController@add');

//  order route
Route::post('add/order/details/request', 'API\OrderDetailsController@add');
Route::post('add/order/products/request', 'API\OrderProductsController@add');
Route::post('add/order/payments/request', 'API\OrderPaymentController@add');

// timeslot route
Route::post('add/time/slot/request', 'API\OrderTimeSlotController@add');
Route::post('show/time/slot/request', 'API\OrderTimeSlotController@show');
Route::post('add/time/slot/list/request', 'API\OrderTimeSlotListController@add');
Route::post('show/time/slot/list/request', 'API\OrderTimeSlotListController@show');
