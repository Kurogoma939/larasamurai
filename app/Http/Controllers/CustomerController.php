<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Pref;

class CustomerController extends Controller
{
    //モデルを使って、データベースとのやり取りを行う。

    //if使ってまとめた方がいい？　とりあえずここはデータの取得
    public function getPrefist()
    {
        $prefs = Pref::all();
        return view('index',['prefs' => $prefs]);
        //$pref->nameとしてビューに取得させるために各ビューに渡さないといけない？
    }
    public function getCustomerlist()
    {
        $customers = Customer::all();
        return view('index', ["customers" => $customers]);
        //上と同じ。$customer->pref_idを見直す。多分これだとidが出てしまいそう。
    }

    //ここでデータの保存
    public function postList(Request $request)
    {
        //requestを使ったコードに書き換える。
        $customers = App\Customer::all();
        return view('hello.index',['customers' => $customers]);

        $prefs = App\Pref::all();
    }

    //検索した時に、データを引っ張ってきて表示するメソッド。多分もっと工夫が必要では・・・？エラー表記とか。
    public function search(Request $request)
    {
        $item = Custmer::find($request->input);
        $param = ['input' => $request->input, 'item' => $item];
        return view('detail', $param);
    }
}
//Eroquentとか使ってデータベースから引っ張ってくるモデル
