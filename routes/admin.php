<?php

//Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
//    Route::resource('account', 'AccountController', ['except' => ['create']]);
//});
//
//Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
//    Route::resource('search/account', 'SearchAccountController');
//});
Route::get('admin/{all}', function () {
    return view('layouts.app');
})->where(['all' => '.*']);
