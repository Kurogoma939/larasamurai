<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityAjaxController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     * ajaxの処理
     */
    public function citySelect(Request $request)
    {
        $pref_id = $request->input('pref_id');
        return City::where('pref_id', $pref_id)->get();
    }
}

