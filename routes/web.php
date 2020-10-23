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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('home', 'HomeController@index');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('profile', 'HomeController@profile')->name('profile');
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => ['auth', 'check_role']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'staff'], function () {
        Route::get('/', 'UserController@staffList')->name('admin.staff.staffList');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.index');
        Route::get('create', 'UserController@create')->name('admin.user.create');
        Route::get('profile/{id}', 'UserController@profile')->name('admin.user.profile');
        Route::get('delete/{id}', 'UserController@delete')->name('admin.user.delete');

        Route::post('update/{id}', 'UserController@postUpdate')->name('admin.user.postUpdate');
    
    });
 
});
