<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Response;
use App\Customer;
use App\Pref;
use App\City;
use Illuminate\Validation\Validator;


class CustomerController extends Controller
{

    public function getList()
    {
        $cities = City::all();
        $prefs = Pref::all();
        $customers = Customer::all();
        return view('index', compact('customers','prefs','cities'));
    }

    public function postList(Request $request)
    {
        $customers = Customer::all();
        return view('index',compact('customers'));
    }

    //検索した時に、データを引っ張ってきて表示するメソッド。
    public function find()
    {
        $prefs = Pref::all();
        $customers = Customer::all();
        return view('/search', compact('customers','prefs'));
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

    //都道府県->市町村の絞り込み
    public function city_select(Request $request)
    {
        $pref_id = (int)$request->input('pref_id', 1);
        $cities = \App\City::where('pref_id', $pref_id)->get();
        return $cities;;
    }
}
