<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Pref;

class CustomerController extends Controller
{
    public function getList()
    {
        $customers = Customer::all();
        return view('index', ["customers" => $customers]);
        //全データ取得
        $prefs = Pref::all();
        return view('index',['prefs' => $prefs]);

    }

    public function postList()
    {

        $customers = Customer::select('select * from customers');
        return view('hello.index',['customers' => $customers]);

        $prefs = Pref::select('select * from prefs');
    }


    public function getData()
    {

    }

    public function find()
    {

    }

    public function search()
    {

    }
}
//Eroquentとか使ってデータベースから引っ張ってくるモデル
