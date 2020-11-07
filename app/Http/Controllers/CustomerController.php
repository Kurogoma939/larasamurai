<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Pref;

class CustomerController extends Controller
{

    public function getList()
    {
        $prefs = Pref::all();
        $customers = Customer::all();
        return view('index', compact('customers','prefs'));
        //渡すメソッドは１つにまとめる。まとめるために、->with,compact()がある。
    }

    //ここでデータの保存
    public function postList(Request $request)
    {
        $customers = $request['custemer'];
        Customer::insert(['customers' => $customers]);
        return view('index');

    }
    //検索した時に、データを引っ張ってきて表示するメソッド。
    public function search(Request $request, Builder $query)
    {
        //検索条件が４つあるからfind使ったらだめ

        //受け取り
        $last_kana = $request->input('last_kana');
        $first_kana = $request->input('first_kana');
        $gender = $request->input('gender');
        $pref_id = $request->input('pref_id');

        #クエリ生成
        $query = Customer::query();

        #条件分岐
        if(!empty($last_kana))
        {
            $query->where('last_kana','like','%'.$last_kana.'%');
        }
        if(!empty($first_kana))
        {
            $query->where('first_kana','like','%'.$first_kana.'%');
        }
        if(!empty($gender))
        {
            $query->where('gender','like','%'.$gender.'%');
        }
        if(!empty($pref_id))
        {
            $query->where('pref_id','like','%'.$pref_id.'%');
        }

        $customers = $query->get()->orderBy('id','asc')->paginate(10);
        return view('index')->with('customers',$customers);

    }
}
//Eroquentとか使ってデータベースから引っ張ってくるモデル
