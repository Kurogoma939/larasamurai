<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Response;
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

    //ここでデータの取得リスト表記するだけ）
    public function postList(Request $request)
    {
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $last_kana = $request->input('last_kana');
        $first_kana = $request->input('first_kana');
        $gender = $request->input('gender');
        $birthday = $request->input('birthday');
        $post_code = $request->input('post_code');
        $pref_id = $request->input('pref_id');
        $address = $request->input('address');
        $building = $request->input('building');
        $tel = $request->input('tel');
        $mobile = $request->input('mobile');
        $email = $request->input('email');
        $remarks = $request->input('remarks');

        Customer::create($request->all());
        return view('index');

    }
    //検索した時に、データを引っ張ってきて表示するメソッド。



    public function find()
    {
        $prefs = Pref::all();
        $customers = Customer::all();
        return view('/search', compact('customers','prefs'));
        //渡すメソッドは１つにまとめる。まとめるために、->with,compact()がある。
    }
//$query->nameでダイレクトに取得（インプット無しで）
//orwhere,inwhereつかってみる

    public function search(Request $request)
    {
        #クエリ生成
        $prefs = Pref::all();
        $query = Customer::query();

        //受け取り←ここを治す
        $last_kana = $request->input('last_kana');
        $first_kana = $request->input('first_kana');
        //チェックボックスは複数選択ができるから個々で取得する必要がある。
        $gender1 = $request->input('gender1');
        $gender2 = $request->input('gender2');
        $pref_id = $request->input('pref_id');

        #条件分岐
        if(!empty($last_kana))
        {
            $query->where('last_kana','like','%'.$last_kana.'%');
        }
        if(!empty($first_kana))
        {
            $query->where('first_kana','like','%'.$first_kana.'%');
        }

        //性別の分岐、①両方ある、②男のみ、③女のみ、④それ以外（どっちもない）
        if(!empty($gender1) and !empty($gender2)){
            $query->where('gender','>=','1');
        }elseif(!empty($gender1) and empty($gender2)){
            $query->where('gender', 1);
        }elseif(empty($gender1) and !empty($gender2)){
            $query->where('gender', 2);
        }else{
            $query->where('gender','>=','1');
        }

        if(!empty($pref_id))
        {
            $query->where('pref_id','=',$pref_id);
        }

        $customers = $query->get();

        return view('search',compact('customers','prefs'));
    }
}
//Eroquentとか使ってデータベースから引っ張ってくるモデル
