<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
        $customers = new Customer();

        $input = $request->input();
        unset($input['_token']);
        $customers->fill($input)->save();

        return redirect('/index');
    }

    /**
     * 編集画面
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

        $input = $request->input();
        unset($input['_token']);
        $customers->fill($input)->save();

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
     * @return LengthAwarePaginator
     *
     */
    public function search(SearchRequest $request)
    {
        $perPage = config('crud.app.per_page');

        if (empty($input)) {
            return Customer::paginate($perPage);
        }

        $query = Customer::query();

        if (!empty($input['last_kana'])) {
            $query->where('last_kana', 'like', '%'.$input['last_kana'].'%');
        }
        if (!empty($input['first_kana'])) {
            $query->where('first_kana', 'like', '%'.$input['first_kana'].'%');
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

        if (!empty($input['pref_id'])) {
            $query = $query->where('pref_id', '=', $input['pref_id']);
        }

        return $query->paginate($perPage);
    }

    /**
     * @param Request $request
     * @return mixed
     * ajaxの処理
     * ここは別コントローラーで処理した方が良い。
     */
    public function citySelect(Request $request)
    {
        $pref_id = $request->input('pref_id');
        return City::where('pref_id', $pref_id)->get();
    }
}
