<?php

use Illuminate\Http\Request;


Route::group(['middleware' => 'auth:api', 'prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('account', 'AccountController', ['except' => ['create']]);
    Route::post('search/account', 'AccountController@searchByField');
});
Route::group([ 'namespace' => 'Api\V1'], function () {
    Route::post('/register', 'AccountController@register');
});

Route::post('/login', 'AuthController@login');
Route::middleware('auth:api')->post('/logout', 'AuthController@logout');
Route::middleware('auth:api')->post('/getUserInfo', 'AuthController@getUserInfo');

Route::group(['middleware' => 'auth:api', 'prefix' => '/notification'], function () {
    Route::get('getNoti', 'NotiController@getNoti');
    Route::post('markAsRead', 'NotiController@markAsRead');
});

Route::group([
    'prefix' => 'password'
], function () {
    Route::post('create', 'ResetPasswordController@create');
    Route::get('find/{token}', 'ResetPasswordController@find');
    Route::post('reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::middleware('auth:api')->post('exportExcel', 'ExportController@export');

Route::group([
    'prefix' => 'test',
    'middleware' => 'auth:api'
], function () {
    Route::get('getall', 'TestController@getAllTest');
    Route::get('get', 'TestController@getTest');
    Route::post('create', 'TestController@createTest');
    Route::post('update', 'TestController@updateTest');
    Route::post('delete', 'TestController@deleteTest');
});

