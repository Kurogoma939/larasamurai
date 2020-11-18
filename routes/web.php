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

Route::get('/index','CustomerController@getList');
Route::post('/index','CustomerController@postList');

//検索した時のアクション。
Route::get('search','CustomerController@find');
Route::post('search','CustomerController@search');

//新規登録した時のアクション
Route::get('create','MainController@create');
Route::post('create','MainController@store');


//編集したときのアクション。取得と更新。
Route::get('edit/{id}','MainController@edit');
Route::post('edit/{id}','MainController@updata');

//選択したデータの詳細表示と削除
Route::get('detail/{id}','MainController@show');
Route::get('delete/{id}', 'MainController@remove')->name('customer_delete');


Route::get(
    '/test-api',
    function (\Illuminate\Http\Request $request) {
    // GETパラメーターの都道府県IDを受け取ります
    $pref_id = (int)$request->input('pref_id', 1);
    // すべての市区町村から、指定された都道府県に紐づくデータに絞り込みます
    $cities = \App\City::where('pref_id', $pref_id)->get();
    // 得られたデータをそのまま return します
    // Laravel が通信しやすい JSON 形式に変換します
    return $cities;;
    }
   );
