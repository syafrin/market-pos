<?php

use Illuminate\Http\Request;

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

Route::apiResource('agent', 'Api\AgentController');
Route::get('search_agent','Api\AgentController@search');
Route::post('login_employe', 'Api\EmployeController@login_employe');
Route::get('get_category', 'Api\CategoryController@get_all');
Route::post('get_product', 'Api\ProductController@get_product_category');
Route::post('add_cart', 'Api\TransactionCartController@add_cart');
Route::post('get_cart', 'Api\TransactionCartController@get_cart');
Route::post('delete_item_cart', 'Api\TransactionCartController@delete_item');
Route::post('delete_cart', 'Api\TransactionCartController@delete_cart');
Route::post('checkout', 'Api\TransactionCartController@checkout');
Route::post('get_transaction', 'Api\TransactionCartController@getTransaction');
Route::post('get_detail_transaction', 'Api\TransactionCartController@getDetailTransaction');