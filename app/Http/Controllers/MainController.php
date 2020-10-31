<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\CustomerController;
use App\Customer;



class MainController extends Controller
{
    //全体的にモデル表記じゃなくDB表記で書く！

    //初期として、今ある（シーダーで作ってある）データの表示
    public function index(Request $request)
    {
       $lists = App\Customer::all();
       return view('index', ['lists'=>$lists]);

    }

    public function create(Request $request)
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $param = [
            'last_name' => $request->first_name,
            'first_name' => $request->first_name,
            'last_kana' => $request->last_kana,
            'first_kana' => $request->first_kana,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'post_code' => $request->post_code,
            'pref_id' => $request->pref_id,
            'address' => $request->address,
            'tel' => $request->tel,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'remarks' => $request->rebark,
        ];
        //取得したデータをモデルに入れ、その後再びビューを表示。
        Customer::insert($param);
        return redirect('index');
    }

    public function edit(Request $request)
    {
        //DBで書いたらこんな感じになる。モデルとして書き直して修正。
        $item = DB::table('customers')
            ->where('id', $request->id)->first();
        return view('edit', ['item'=>$item]);
    }

    public function updata(Request $request)
    {
        $param = [
            'last_name' => $request->first_name,
            'first_name' => $request->first_name,
            'last_kana' => $request->last_kana,
            'first_kana' => $request->first_kana,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'post_code' => $request->post_code,
            'pref_id' => $request->pref_id,
            'address' => $request->address,
            'tel' => $request->tel,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'remarks' => $request->rebark,
        ];
        //ここも修正が必要。モデル使って書き直し。
        DB::table('customers')
            ->where('id', $request->id)
            ->update($param);
        return redirect('index');

    }

    public function remove(Request $request)
    {
        DB::table('customers')
            ->where('id', $request->id)->delete();
        return redirect('index');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('customers')
            ->limit(10)
            ->get();
        return view('hello.show',['items'=>$items]);
    }
}


//全体制御のコントローラー

