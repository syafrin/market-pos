<?php

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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('template', 'layouts.template');
Route::match(["GET", "POST"], "/register", function(){
    return redirect('login');
})->name("register");

Route::resource('user', 'UserController');
Route::resource('supplier', 'SupplierController')->except(['show']);
Route::resource('employe', 'EmployeController')->except(['show']);
Route::resource('category', 'CategoryController')->except(['show']);
Route::resource('product', 'ProductController')->except(['show']);
Route::resource('transaction', 'TransactionController')->only(['index','create','store','destroy']);
Route::get('agent', 'AgentController@index')->name('agents');
Route::get('sale-report', 'SalesReportController@index')->name('sale-report');
Route::get('export-pdf', 'SalesReportController@cetak_pdf')->name('export-pdf');