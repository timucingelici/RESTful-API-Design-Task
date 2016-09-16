<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return ['api' => 'v0.1'];
});

// USERS
Route::get('/users', 'UserController@index');
Route::group(['prefix' => 'user'], function(){
    Route::get('{id}', 'UserController@show');
    Route::get('{id}/orders', 'UserController@orders');
});

// ORDERS
Route::get('/orders', 'OrderController@index');
Route::get('/orders/summary', 'OrderController@summary');

Route::group(['prefix' => 'order'], function(){
    Route::get('{id}', 'OrderController@show');
    Route::get('{id}/user', 'OrderController@showUser');
    Route::get('{id}/retailer', 'OrderController@showRetailer');
});

// RETAILERS
Route::get('/retailers', 'RetailerController@index');
Route::group(['prefix' => 'retailer'], function(){
    Route::get('{id}', 'RetailerController@show');
});

// ROLES
Route::get('/roles', 'RoleController@index');
Route::group(['prefix' => 'role'], function(){
    Route::get('{id}', 'RoleController@show');
});