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
    return view('welcome');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::namespace('Auth')->group(function () {
//    Route::get('login', 'LoginController@index')->name('login');
//});


//use App\DemoFacade;
//use Illuminate\Support\Facades\Route;

//Route::get('{all}', function () {
//    return view('layouts.app');
//})->where(['all' => '.*']);


//Route::get('/',function(){
//   DemoFacade::hello('dung');
//});
//Route::get('/pay','HomeController@pay');

