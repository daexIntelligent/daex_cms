<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api', 'middleware' => ['cors']], function () {

    /*
    |--------------------------------------------------------------------------
    | Open Routes
    |--------------------------------------------------------------------------
    */

    Route::post('users/login', 'UserController@login');
    Route::post('users/logout', 'UserController@logout');
    
    /*
    |--------------------------------------------------------------------------
    | Protected Routes, Authorization Required
    |--------------------------------------------------------------------------
    */

    Route::group(['middleware' => []], function () {
        Route::get('users', 'UserController@userList');
        Route::post('users', 'UserController@createUsers');
        Route::put('users', 'UserController@updateUsers');

        Route::get('customers', 'CustomerController@customerList');
        Route::post('customers', 'CustomerController@createCustomer');
        Route::put('customers', 'CustomerController@updateCustomer');
    });
});
