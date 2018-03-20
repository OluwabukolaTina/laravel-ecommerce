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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('products', 'productsController');

Route::get('/products', [

	'uses' => 'ProductsController@index',

	'as' => 'products.index'

]);

Route::get('/products/create', [

	'uses' => 'ProductsController@create',

	'as' => 'products.create'

]);

Route::get('/products/edit/{id}', [

	'uses' => 'ProductsController@edit',

	'as' => 'products.edit'

]);

Route::post('/products/update/{id}', [

	'uses' => 'ProductsController@update',

	'as' => 'products.update'

]);

Route::get('/products/destroy/{id}', [

	'uses' => 'ProductsController@destroy',

	'as' => 'products.destroy'

]);