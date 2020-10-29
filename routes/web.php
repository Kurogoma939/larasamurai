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

/* メインコントローラーのルーティング */

//基本的にデータの取得＋反映で１つずつアクションを起こす。
Route::get('index','CustomerController@getList');
Route::post('index','CustomerController@postList');

Route::get('create','CoustomerController@index');
