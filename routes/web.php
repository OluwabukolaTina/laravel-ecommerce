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

Route::get('/', [

	'uses' => 'FrontEndController@index',

	'as' => 'index'

]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('products', 'productsController');

Route::get('/products', [

	'uses' => 'ProductsController@index',

	'as' => 'products.index'

]);

Route::get('/categories', [

	'uses' => 'CategoriesController@index',

	'as' => 'categories.index'

]);

Route::get('/products/create', [

	'uses' => 'ProductsController@create',

	'as' => 'products.create'

]);

Route::get('/category/create', [

	'uses' => 'CategoriesController@create',

	'as' => 'category.create'

]);

Route::post('/products/store', [

	'uses' => 'ProductsController@store',

	'as' => 'products.store'

]);

Route::post('/category/store', [

	'uses' => 'CategoriesController@store',

	'as' => 'category.store'

]);

Route::get('/products/edit/{id}', [

	'uses' => 'ProductsController@edit',

	'as' => 'products.edit'

]);

Route::get('/categories/edit/{id}', [

	'uses' => 'CategoriesController@edit',

	'as' => 'category.edit'

]);

Route::post('/categories/update/{id}', [

	'uses' => 'CategoriesController@update',

	'as' => 'category.update'

]);

Route::get('/products/destroy/{id}', [

	'uses' => 'ProductsController@destroy',

	'as' => 'products.destroy'

]);

Route::get('/categories/destroy/{id}', [

	'uses' => 'CategoriesController@destroy',

	'as' => 'category.delete'

]);

Route::get('/product/{id}', [

		'uses' => 'FrontEndController@singleProduct',

		'as' => 'product.single'

]);

Route::post('/cart/add', [
		'uses'=> 'ShoppingController@addToCart',

		'as' => 'cart.add'

]);

Route::get('/cart/rapid/add/{id}', [

		'uses'=> 'ShoppingController@rapidAdd',

		'as' => 'cart.rapid.add'

]);

Route::get('/cart', [

		'uses' => 'ShoppingController@cart',

		'as' => 'cart'

]);

Route::get('/cart/delete/{id}', [

		'uses' => 'ShoppingController@cartDelete',

		'as' => 'cart.delete'

]);

Route::get('/cart/increment/{id}/{qty}', [

		'uses' => 'ShoppingController@increment',

		'as' => 'cart.incr'

]);

Route::get('/cart/decrement/{id}/{qty}', [

		'uses' => 'ShoppingController@decrement',

		'as' => 'cart.decr'

]);

Route::get('cart/checkout', [

		'uses' => 'CheckoutController@index',

		'as' => 'cart.checkout'

]);

Route::post('/cart/checkout', [

		'uses' => 'CheckoutController@pay',

		'as' => 'cart.checkout'

]);
