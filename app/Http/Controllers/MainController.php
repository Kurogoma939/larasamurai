<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\CustomerController;
use App\Customer;
use App\Pref;



class MainController extends Controller
{
    //全体的にDB表記じゃなくモデル表記で書く！
    //初期として、今ある（シーダーで作ってある）データの表示
    public function index(Request $request)
    {
       $customers = Customer::all();
       return view('index', compact('customers'));
    }

    public function create(Request $request)
    {
        $prefs = Pref::all();
        $customers = Customer::all();
        return view('create', compact('customers','prefs'));
    }

    public function store(CustomerRequest $request)
    {
            $customer = new Customer();

            $customer->last_name = $request->input('last_name');
            $customer->first_name = $request->input('first_name');
            $customer->last_kana = $request->input('last_kana');
            $customer->first_kana = $request->input('first_kana');
            $customer->gender = $request->input('gender');
            $customer->birthday = $request->input('birthday');
            $customer->post_code = $request->input('post_code');
            $customer->pref_id = $request->input('pref_id');
            $customer->address = $request->input('address');
            $customer->tel = $request->input('tel');
            $customer->mobile = $request->input('mobile');
            $customer->email = $request->input('email');
            $customer->remarks = $request->input('remarks');

            Customer::create($request->all());

            return redirect('index');
    }


    //編集画面
    public function edit(Request $request,$id)
    {
        $prefs = Pref::all();
        $customers = Customer::where('id', '=', $request['id'])->first();
        return view('edit',compact('customers','prefs'));
    }

    public function updata(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->last_name = $request->last_name;
        $customer->first_name = $request->first_name;
        $customer->last_kana = $request->last_kana;
        $customer->first_kana = $request->first_kana;
        $customer->gender = $request->gender;
        $customer->birthday = $request->birthday;
        $customer->post_code = $request->post_code;
        $customer->pref_id = $request->pref_id;
        $customer->address = $request->address;
        $customer->tel = $request->tel;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->remarks = $request->remarks;

        $customer->save();
        return redirect('/index');

    }

    //詳細削除　
    public function show(Request $request)
    {
        $prefs = Pref::all();
        $customers = Customer::where('id', '=', $request['id'])->first();
        return view('detail',compact('customers','prefs'));
    }

    public function remove(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
        return redirect('/index');;
    }
}


//全体制御のコントローラー

?>
