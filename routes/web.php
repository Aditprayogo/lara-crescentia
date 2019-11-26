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


Route::prefix('admin')->namespace('Admin')->group(function () {
	// Controllers Within The "App\Http\Controllers\Admin" Namespace
	Route::get('/', [
		'as' => 'dashboard',
		'uses' => 'DashboardController@index'
	]);
});

