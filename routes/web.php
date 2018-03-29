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

Route::get('/test', function(){

	return App\Product::with('category')->get();

});

Route::name('index')->get('/','FrontEndController@index');

// Route::resource('products', 'productsController');

Route::name('products.index')->get('/products', 'ProductsController@index');

Route::name('categories.index')->get('/categories', 'CategoriesController@index');

Route::name('products.create')->get('/products/create', 'ProductsController@create');

Route::name('category.create')->get('/category/create', 'CategoriesController@create');

Route::name('products.store')->post('/products/store', 'ProductsController@store');

Route::name('category.store')->post('/category/store', 'CategoriesController@store');

Route::name('products.edit')->get('/products/edit/{id}', 'ProductsController@edit');

Route::name('category.edit')->get('/categories/edit/{id}', 'CategoriesController@edit');

Route::name('category.update')->post('/categories/update/{id}', 'CategoriesController@update');

Route::name('products.destroy')->get('/products/destroy/{id}', 'ProductsController@destroy');

Route::name('category.delete')->get('/categories/destroy/{id}', 'CategoriesController@destroy');

Route::name('product.single')->get('/product/{id}', 'FrontEndController@singleProduct');

Route::name('cart.add')->post('/cart/add', 'ShoppingController@addToCart');

Route::name('cart')->get('/cart', 'ShoppingController@cart');

Route::name('cart.delete')->get('/cart/delete/{id}', 'ShoppingController@cartDelete');

Route::name('cart.incr')->get('/cart/increment/{id}/{qty}', 'ShoppingController@increment');

Route::name('cart.decr')->get('/cart/decrement/{id}/{qty}', 'ShoppingController@decrement');

Route::name('cart.rapid.add')->get('/cart/rapid/add/{id}', 'ShoppingController@rapidAdd');

Route::name('cart.checkout')->get('/cart/checkout', 'CheckoutController@index');

Route::name('cart.checkout')->post('/cart/checkout', 'CheckoutController@pay');

Auth::routes();

Route::name('home')->get('/home', 'HomeController@index');