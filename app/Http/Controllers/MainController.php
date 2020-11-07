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
            $last_name = $request->input('last_name');
            $first_name = $request->input('first_name');
            $ast_kana = $request->input('last_kana');
            $first_kana = $request->input('first_kana');
            $gender = $request->input('gender');
            $birthday = $request->input('birthday');
            $post_code = $request->input('post_code');
            $pref_id = $request->input('pref_id');
            $address = $request->input('address');
            $tel = $request->input('tel');
            $mobile = $request->input('mobile');
            $remarks = $request->input('remarks');

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

        $customers = [
            'last_name' => $request->last_name,
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
            'remarks' => $request->remarks,
        ];

        Customer::where('id', $request->id)->updata($customers);

        return redirect('index');
    }

    //詳細削除　
    public function remove(Request $request)
    {
        Customer::where('id', $request->id)->delete();
        return redirect('index');
    }

    public function show(Request $request)
    {
        $name = $request->name;
        $customers = Customer::where($request->name)->get();
        return view('detail',['customers' => $customers]);
    }
}


//全体制御のコントローラー

?>
