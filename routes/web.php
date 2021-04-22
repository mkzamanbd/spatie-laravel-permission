<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('dashboard', 'HomeController@index')->name('home');

//role
Route::resource('role', 'RoleController');
//current user
Route::get('current-user', 'HomeController@profile')->name('current-user.show');
Route::get('current-user/edit', 'HomeController@edit')->name('current-user.edit');
Route::post('current-user/update', 'HomeController@update')->name('current-user.update');
//user
Route::resource('user', 'UserController');
//generate permission
Route::get('generate-permission', 'PermissionController@generateAllPermissions')->name('generate.permission');
