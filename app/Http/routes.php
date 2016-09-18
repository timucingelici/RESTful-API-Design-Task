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
    return "Nothing to see here...";
});

Route::group(['prefix' => '/api/v1','middleware' => 'api'], function(){
    Route::get('/', function () {
        return ['api' => 'v0.1'];
    });

    // USERS
    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@create');
    Route::group(['prefix' => 'user'], function(){
        Route::get('{id}', 'UserController@show');
        //Route::patch('{id}', 'UserController@edit');
        //Route::delete('{id}', 'UserController@delete');

        Route::get('{id}/orders', 'UserController@orders');

    });

    // ORDERS
    Route::get('/orders', 'OrderController@index');
    Route::get('/orders/summary', 'OrderController@summary');

    Route::group(['prefix' => 'order'], function(){
        Route::get('{id}', 'OrderController@show');
        Route::patch('{id}', 'OrderController@update');
        //Route::delete('{id}', 'OrderController@delete');

        Route::get('{id}/user', 'OrderController@showUser');
        Route::get('{id}/retailer', 'OrderController@showRetailer');

        Route::post('/', 'OrderController@create');
    });

    // RETAILERS
    Route::get('/retailers', 'RetailerController@index');
    Route::group(['prefix' => 'retailer'], function(){
        Route::get('{id}', 'RetailerController@show');
        Route::patch('{id}', 'RetailerController@edit');
    });

    // ROLES
    Route::get('/roles', 'RoleController@index');
    Route::group(['prefix' => 'role'], function(){
        Route::get('{id}', 'RoleController@show');
    });
});