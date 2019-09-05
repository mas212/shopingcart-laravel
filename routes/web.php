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

Auth::routes();

Route::get('/', [
	'uses' 	=>  'HomeController@index',
	'as' 	=> 'dashbord.index'
]);

Route::resource('category', 'CategoriesController');
Route::resource('class', 'ClassController');
Route::resource('product', 'ProductController');

//product
Route::get('product-detail/{id}', [
	'uses' 	=> '\App\Http\Controllers\FE\ProductController@getDetail',
	'as'	=> 'product-detail.detail'
]);

//cart
Route::post('product/cart', [
	'uses' 	=> '\App\Http\Controllers\Cart\CartController@addToCart',
	'as'	=> 'product.cart'
]);

Route::match(['get', 'post'], '/cart', '\App\Http\Controllers\Cart\CartController@cart');

Route::get('cart/update-qty/{id}/{qty}', [
	'uses' 		=> '\App\Http\Controllers\Cart\CartController@updateQty',
	'as'		=> 'cart.update-qty'
]);

Route::delete('/cart/delete-product/{id}',[
	 'uses' => '\App\Http\Controllers\Cart\CartController@deleteCart',
	 'as' => 'cart.delete'
]);

//checkout
Route::match(['get', 'post'], 'cart/checkout', [
	'uses' 		=> '\App\Http\Controllers\Cart\CheckoutController@checkout',
	'as'		=> 'cart.checkout'
]);
//order review
Route::match(['get', 'post'], 'order/review', [
	'uses' 		=> '\App\Http\Controllers\Cart\CheckoutController@orderReview',
	'as' 		=> 'order.review'
]);

Route::match(['get', 'post'], 'cart/order', [
	'uses' 		=> '\App\Http\Controllers\Order\OrderController@getOrder',
	'as' 		=> 'cart.order'
]);

Route::match(['get', 'post'], 'cart/order/thank', [
	'uses' 		=> '\App\Http\Controllers\Order\OrderController@thanks',
	'as' 		=> 'cart.order.thanks'
]);

//profile
Route::get('user/profile/create', [
	'uses' 		=> '\App\Http\Controllers\User\UserProfileController@create',
	'as'		=> 'user.profile.create'
]);

Route::patch('user/profile/update', [
	'uses' => '\App\Http\Controllers\User\UserProfileController@update',
	'as' => 'user.profile.update'
]);