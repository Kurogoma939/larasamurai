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

Route::get('/index', 'MainController@getList');
//検索した時のアクション。
Route::get('/search', 'MainController@find');
Route::post('/search', 'MainController@search');

//新規登録
Route::get('/create', 'MainController@create');
Route::post('/create', 'MainController@store');

//編集
Route::get('/edit/{id}', 'MainController@edit');
Route::post('/edit/{id}', 'MainController@updata');

//詳細表示と削除
Route::get('/detail/{id}', 'MainController@show');
Route::get('/delete/{id}', 'MainController@remove')->name('customer_delete');

//ajax
Route::get('/city-api', 'MainController@citySelect');
