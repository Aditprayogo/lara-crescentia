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

Route::get('/', 'HomeController@index')
	->name('home.index');

Route::get('/detail/{slug}', 'DetailController@index')
	->name('detail.index');

Route::post('/checkout/{id}', 'CheckoutController@process')
	->name('checkout.process')
	->middleware(['auth', 'verified']);


Route::get('/checkout/{id}', 'CheckoutController@index')
	->name('checkout.index')
	->middleware(['auth', 'verified']);


Route::post('/checkout/create/{id}', 'CheckoutController@create')
	->name('checkout.create')
	->middleware(['auth', 'verified']);


Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
	->name('checkout.remove')
	->middleware(['auth', 'verified']);


Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
	->name('checkout.success')
	->middleware(['auth', 'verified']);


Route::prefix('admin')
	->namespace('Admin')
	->middleware(['auth', 'admin'])
	->group(function () {
		
		Route::get('/', [
			'as' => 'dashboard',
			'uses' => 'DashboardController@index'
		]);

		Route::resource('travel-package', 'TravelPackageController');
		
		Route::resource('gallery', 'GalleryController');

		Route::resource('transaction', 'TransactionController');
	});


Auth::routes(['verify' => true]);


