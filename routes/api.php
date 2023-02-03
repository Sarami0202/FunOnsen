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

//投票数
Route::get('/vote/{id?}', 'App\Http\Controllers\VoteController@index');
Route::post('/vote', 'App\Http\Controllers\VoteController@store');
Route::post('/check', 'App\Http\Controllers\VoteController@check');
//温泉情報
Route::get('/onsen/{name?}', 'App\Http\Controllers\OnsenController@index');
Route::post('/onsen', 'App\Http\Controllers\OnsenController@store');
Route::post('/onsen/{id}', 'App\Http\Controllers\OnsenController@update');
Route::delete('/onsen/{id}', 'App\Http\Controllers\OnsenController@destroy');
//部門選択
Route::get('/category/{name?}', 'App\Http\Controllers\CategoryController@index');
//エリア選択
Route::get('/area/{area?}', 'App\Http\Controllers\AreaController@index');
//話題の温泉
Route::get('/favorite', 'App\Http\Controllers\FavoriteController@index');
Route::post('/favorite', 'App\Http\Controllers\FavoriteController@store');
//IPアドレス
Route::get('/ip', 'App\Http\Controllers\IpController@index');
//メールアドレス
Route::get('/onsen_email', 'App\Http\Controllers\OnsenEmailController@index');
Route::post('/onsen_email', 'App\Http\Controllers\OnsenEmailController@store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
