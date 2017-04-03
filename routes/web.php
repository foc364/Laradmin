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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('customers', 'CustomersController');
    Route::resource('brands', 'BrandsController');
    Route::resource('product-categories', 'ProductCategoriesController');
    Route::resource('products', 'ProductsController');
    Route::resource('usuarios', 'UsersController');

    Route::get('orders', [
        'uses' => 'OrdersController@index',
        'as' => 'orders.index',
    ]);

    Route::get('home', function () {
        return view('admin.home');
    })->name('home');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

    Route::get('logout', [
        'namespace' => 'Admin',
        'uses' => 'Auth\LoginController@logout'
    ]);
});

Route::get('/admin', function () {
    return redirect()->route('login');
})->name('admin');



