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

Route::middleware(['auth'])->group(function(){
	Route::get('/', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');	
});


/*
|---------------------
|  Admin Routes
|---------------------
|
| The routes to define the administration routes
|
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
	Route::get('', 'Admin\DashboardController@index');
	Route::get('dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
	Route::resource('users', 'Admin\UsersController', ['except'=>['show']]);
});
