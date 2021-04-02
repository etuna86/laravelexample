<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\UseSSl;
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

//Route::get('/getdata','HomeController@getdata');
//Route::get('/insertdata','HomeController@insertdata');
Route::get('/getnumber','HomeController@getNumber');

Route::post('/savepoint','HomeController@savePoint');
Route::post('/signin','HomeController@getSignin');


Route::group(['middleware' => 'use.ssl'], function () {
    Route::get('/getdata','HomeController@getdata');
    Route::get('/insertdata','HomeController@insertdata');
});