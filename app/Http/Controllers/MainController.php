<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\EditValidateRequest;
use App\Http\Requests\SearchValidateRequest;
use Illuminate\Http\Response;
use App\Customer;
use App\Pref;
use App\City;
use Illuminate\Validation\Validator;
use App\Http\Validators\ValidatorEx;


class MainController extends Controller
{
    public function index()
    {
       $customers = Customer::all();
       return view('index', compact('customers'));
    }

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

    public function create(Request $request)
    {
        $prefs = Pref::all();
        $cities = City::all();
        $customers = Customer::all();
        return view('create', compact('customers','prefs','cities'));
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer();

        //$customer->fill($request->all())->save();ってやりたいのにエラー出る。
        //in_array() expects parameter 2 to be array, string given
        $customer->last_name = $request->input('last_name');
        $customer->first_name = $request->input('first_name');
        $customer->last_kana = $request->input('last_kana');
        $customer->first_kana = $request->input('first_kana');
        $customer->gender = $request->input('gender');
        $customer->birthday = $request->input('birthday');
        $customer->post_code = $request->input('post_code');
        $customer->pref_id = $request->input('pref_id');
        $customer->city_id = $request->input('city_id');
        $customer->address = $request->input('address');
        $customer->building = $request->input('building');
        $customer->tel = $request->input('tel');
        $customer->mobile = $request->input('mobile');
        $customer->email = $request->input('email');
        $customer->remarks = $request->input('remarks');

        $customer->save();

        return redirect('/index');
    }

    //編集画面
    public function edit(Request $request,$id)
    {
        $prefs = Pref::all();
        $cities = City::all();
        $customers = Customer::where('id', '=', $request['id'])->first();
        return view('edit',compact('customers','prefs','cities'));
    }

    public function updata(EditValidateRequest $request, $id)
    {
        $customers = Customer::where('id', '=', $request['id'])->first();

        $customers->last_name = $request->last_name;
        $customers->first_name = $request->first_name;
        $customers->last_kana = $request->last_kana;
        $customers->first_kana = $request->first_kana;
        $customers->gender = $request->gender;
        $customers->birthday = $request->birthday;
        $customers->post_code = $request->post_code;
        $customers->pref_id = $request->pref_id;
        $customers->city_id = $request->city_id;
        $customers->address = $request->address;
        $customers->building = $request->building;
        $customers->tel = $request->tel;
        $customers->mobile = $request->mobile;
        $customers->email = $request->email;
        $customers->remarks = $request->remarks;

        $customers->save();

        return redirect('/index');
    }

    public function show(Request $request)
    {
        $prefs = Pref::all();
        $cities = City::all();
        $customers = Customer::where('id', '=', $request->id)->first();
        return view('detail',compact('customers','prefs','cities'));
    }

    public function remove(Request $request)
    {
        $customer = Customer::where('id', '=', $request->id)->delete();
        return redirect('/index');
    }

    //検索した時に、データを引っ張ってきて表示するメソッド。
    public function find()
    {
        $prefs = Pref::all();
        $customers = Customer::all();
        return view('/search', compact('customers','prefs'));
    }

    public function search(SearchValidateRequest $request)
    {

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

?>
