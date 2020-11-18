<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
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

        $validate_rule = [
            'last_name' => ['required','string','max:50'],
            'first_name' => ['required','string','max:50'],
            'last_kana' => ['required','string','max:50'],
            'first_kana' => ['required','string','max:50'],
            'gender' => ['required','integer'],
            'birthday' => ['required','date'],
            'post_code' => ['required','string'],
            'pref_id' =>['required','integer'],
            'city_id' =>['required','integer'],
            'address' => ['required','string','max:80'],
            'building' => ['nullable','string','max:80'],
            'tel' => ['required','regex:/^0\d{1,3}-\d{1,4}-\d{4}$/'],
            'mobile' => ['required','regex:/^(070|080|090)-\d{4}-\d{4}$/'],
            'email' => ['required','unique_email'],
            'remarks' => ['nullable','string','max:80'],
        ];
        $this->validate($request, $validate_rule);


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

    public function updata(Request $request, $id)
    {
        $customers = Customer::where('id', '=', $request['id'])->first();

        $validate_rule = [
            'last_name' => ['required','string','max:50'],
            'first_name' => ['required','string','max:50'],
            'last_kana' => ['required','string','max:50'],
            'first_kana' => ['required','string','max:50'],
            'gender' => ['required','integer'],
            'birthday' => ['required','date'],
            'post_code' => ['required','string'],
            'pref_id' =>['required','integer'],
            'city_id' =>['required','integer'],
            'address' => ['required','string','max:80'],
            'building' => ['nullable','string','max:80'],
            'tel' => ['required','regex:/^0\d{1,3}-\d{1,4}-\d{4}$/'],
            'mobile' => ['required','regex:/^(070|080|090)-\d{4}-\d{4}$/'],
            //ここにユニーク設定入れてしまうと更新できない・・・。
            'email' => ['required'],
            'remarks' => ['nullable','string','max:80'],
        ];
        $this->validate($request, $validate_rule);

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

}

?>
