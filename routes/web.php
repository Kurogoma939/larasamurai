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

//①CustomerControllerのルーティング

//DBからリストの取得と、入力したデータのDBへの反映
Route::get('index','CustomerController@getList');
Route::post('index','CustomerController@postList');
//検索した時のアクション。
//Route::get('detail','CustomerController@search');

//②MainControllerのルーティング

//最初はシーダーにあるものを表記。
//新規登録した時のデータの取得と登録アクション
Route::get('create','MainController@create');
Route::post('create','MainController@store');

//編集したときのアクション。取得と更新。
Route::get('edit/{id}','MainController@edit');
Route::post('edit/{id}','MainController@updata');



//選択したデータの詳細表示と削除
Route::get('detail/{id}','MainController@show');
Route::delete('detail/{id}','MainController@remove');


