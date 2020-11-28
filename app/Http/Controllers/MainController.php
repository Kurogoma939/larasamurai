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
class MainController extends Controller
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

        $per_page = config('crud.app.per_page');
        $customers = Customer::paginate($per_page);

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
        $customers = Customer::paginate(10);
        $query = Customer::query();
        $last_kana = $request->last_kana;
        $first_kana = $request->first_kana;
        $gender1 = $request->gender1;
        $gender2 = $request->gender2;
        $pref_id = $request->pref_id;

        if (!empty($last_kana)) {
            $query->where('last_kana', 'like', '%'.$last_kana.'%');
        }
        if (!empty($first_kana)) {
            $query->where('first_kana', 'like', '%'.$first_kana.'%');
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

        if (!empty($pref_id)) {
            if ($pref_id > 1) {
                $query->where('pref_id', $pref_id);
            }
        }

        $per_page = config('crud.app.per_page');
        $customers = $query->paginate($per_page);
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
