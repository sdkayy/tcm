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

Route::get('home', function() {
	return redirect('dashboard');
});


//Whitelist
Route::post('whitelist/add', 'DashboardController@addWhitelist');
Route::get('whitelist/{whitelist_id}/delete', 'DashboardController@removeWhitelist');

//Admin
Route::get('manage', 'DashboardController@manage')->name('manage');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('admins/{admin_id}/delete', 'DashboardController@removeAdmin');
Route::post('admins/add', 'DashboardController@addAdmin');

//User functions
Route::get('login', 'AdminController@index')->name('login');
Route::post('login', 'AdminController@login');
Route::get('logout', 'AdminController@logout')->name('logout');
Route::get('lookup', 'PublicController@index')->name('lookup');

//Record stuff
Route::get('records/{record_id}/delete', 'DashboardController@delete');
Route::post('records/massDelete', 'DashboardController@mass');

//Account Options
Route::get('accounts/password', 'AdminController@changePassword')->name('account');
Route::post('accounts/password/change', 'AdminController@setPassword');

//Api
Route::post('api/records/add', 'ApiController@add');
Route::post('api/records/get', 'ApiController@get');
Route::post('api/session/get', 'ApiController@generateSession');
Route::post('api/session/verify', 'ApiController@checkSession');