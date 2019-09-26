<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'auth:api', 'prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('account', 'AccountController', ['except' => ['create']]);
    Route::resource('search/account', 'SearchAccountController');
});

Route::post('/login', 'AuthController@login');
Route::middleware('auth:api')->post('/logout', 'AuthController@logout');
Route::middleware('auth:api')->get('/getUserInfo', 'AuthController@getUserInfo');

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


