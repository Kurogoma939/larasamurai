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

Route::get('/', function () {
    return redirect()->route('customer_index');
});

Route::get('/index', 'CustomerController@getList');
//検索した時のアクション。
Route::get('/search', 'CustomerController@search');

//新規登録
Route::get('/create', 'CustomerController@create');
Route::post('/create', 'CustomerController@store');

//編集
Route::get('/edit/{id}', 'CustomerController@edit');
Route::post('/edit/{id}', 'CustomerController@updata');

//詳細表示と削除
Route::get('/detail/{id}', 'CustomerController@show');
Route::get('/delete/{id}', 'CustomerController@remove')->name('customer_delete');

//ajax
Route::get('/city-api', 'CustomerController@citySelect');
