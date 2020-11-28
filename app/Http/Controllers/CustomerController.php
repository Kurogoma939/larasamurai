<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Customer;
use App\Models\Pref;
use App\Models\City;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * @return Factory|Application|View
     */
    public function index()
    {
        $customers = Customer::all();
        return view('index', compact('customers'));
    }

    /**
     * @return Factory|Application|View
     */
    public function getList()
    {
        $prefs = Pref::all();
        $cities = City::all();

        $perPage = config('crud.app.per_page');
        $customers = Customer::paginate($perPage);

        return view('index', compact('customers', 'prefs', 'cities'));
    }

    /**
     * @return Factory|Application|View
     */
    public function create()
    {
        $prefs = Pref::all();
        $cities = City::all();
        $customers = Customer::all();
        return view('create', compact('customers', 'prefs', 'cities'));
    }

    /**
     * @param CustomerRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CustomerRequest $request)
    {
        $customer = new Customer();

        $input = $request->input();
        unset($input['_token']);
        $customer->fill($input)->save();

        return redirect('/index');
    }

    //編集画面

    /**
     * @param Request $request
     * @return Factory|Application|View
     */
    public function edit(Request $request)
    {
        $prefs = Pref::all();
        $cities = City::all();
        $customers = Customer::where('id', '=', $request['id'])->first();
        return view('edit', compact('customers', 'prefs', 'cities'));
    }

    /**
     * @param EditRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function updata(EditRequest $request)
    {
        $customer = Customer::where('id', '=', $request['id'])->first();

        $input = $request->input();
        unset($input['_token']);
        $customer->fill($input)->save();

        return redirect('/index');
    }

    /**
     * @param Request $request
     * @return Factory|Application|View
     */
    public function show(Request $request)
    {
        $prefs = Pref::all();
        $cities = City::all();
        $customers = Customer::where('id', '=', $request->id)->first();
        return view('detail', compact('customers', 'prefs', 'cities'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function remove(Request $request)
    {
        $customer = Customer::where('id', '=', $request->id)->delete();
        return redirect('/index');
    }


    /**
     * @param SearchRequest $request
     * @return Factory|Application|View
     *
     * ここもっとすっきりさせられる。
     */
    public function search(SearchRequest $request)
    {
        $prefs = Pref::all();
        $customers = Customer::all();
        $query = Customer::query();
        $lastKana = $request->last_kana;
        $firstKana = $request->first_kana;
        $gender1 = $request->gender1;
        $gender2 = $request->gender2;
        $prefId = $request->pref_id;

        if (!empty($lastKana)) {
            $query->where('last_kana', 'like', '%'.$lastKana.'%');
        }
        if (!empty($firstKana)) {
            $query->where('first_kana', 'like', '%'.$firstKana.'%');
        }

        if (!empty($input['gender1']) || !empty($input['gender2'])) {
            $genders = [];
            if (!empty($input['gender1'])) {
                $genders[] = $input['gender1'];
            }
            if (!empty($input['gender2'])) {
                $genders[] = $input['gender2'];
            }
            $query = $query->whereIn('gender', $genders);
        }

        if (!empty($prefId)) {
            if ($prefId > 1) {
                $query->where('pref_id', $prefId);
            }
        }

        $perPage = config('crud.app.per_page');
        $customers = $query->paginate($perPage);
        return view('index', compact('customers', 'prefs', 'last_kana', 'first_kana', 'gender1', 'gender2', 'pref_id'));
    }

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
