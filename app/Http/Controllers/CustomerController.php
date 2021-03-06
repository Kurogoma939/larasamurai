<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Response;
use App\Customer;
use App\Pref;
use Illuminate\Validation\Validator;


class CustomerController extends Controller
{

    public function getList()
    {
        $prefs = Pref::all();
        $customers = Customer::all();
        return view('index', compact('customers','prefs'));
    }

    //ここでデータの取得リスト表記するだけ）
    //ここ絶対違う。インプットされるやつなんてないぞ。
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

    public function search(Request $request)
    {
        $validate_rule = [
            'last_kana' => 'nullable|string',
            'first_kana' => 'nullable|string',
            'gender' => 'nullable|integer',
            'pref_id' =>'nullable|integer',
        ];
        $this->validate($request, $validate_rule);

        #クエリ生成
        $prefs = Pref::all();
        $query = Customer::query();
        $last_kana = $request->last_kana;
        $first_kana = $request->first_kana;
        $gender1 = $request->gender1;
        $gender2 = $request->gender2;
        $pref_id = $request->pref_id;


        #条件分岐
        if(!empty($last_kana))
        {
            //$last_kana=Customer::where('last_kana',$request->last_name)
            $query->where('last_kana','like','%'.$last_kana.'%');
        }

        if(!empty($first_kana))
        {
            $query->where('first_kana','like','%'.$first_kana.'%');
        }


        //性別の分岐、①両方ある、②男のみ、③女のみ、④それ以外（どっちもない）
        if(!empty($gender1) && !empty($gender2)){
            $query->whereIn('gender',[1,2]);
        }elseif(!empty($gender1)){
            $query->where('gender',1);
        }elseif(!empty($gender2)){
            $query->where('gender',2);
        }elseif(empty($gender1) && empty($gender2)){
            $query->whereIn('gender',[1,2]);
        }


        //pref_idの1を""としているせいで、idが１のとき排除するということをしなくてはならない

        if(!empty($pref_id)){
            if($pref_id > 1){
                $query->where('pref_id',$pref_id);
            }
        }

        $customers = $query->get();

        return view('/search',compact('customers','prefs','last_kana','first_kana','gender1','gender2','pref_id'));
    }
}
