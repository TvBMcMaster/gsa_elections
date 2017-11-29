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

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function(){
	Route::get('', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
	
	Route::prefix('users')->group(function(){
		Route::get('/', 'UsersController@index')->name('users.index');
		Route::get('/new', 'UsersController@create')->name('users.create');
		Route::post('/new', 'UsersController@store')->name('users.store');
		Route::get('/{user}', 'UsersController@show')->name('users.show');
		Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
		Route::post('/{user}', 'UsersController@update')->name('users.update');
		Route::post('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
	});
	
	Route::resource('organizations', 'OrganizationsController');
});
