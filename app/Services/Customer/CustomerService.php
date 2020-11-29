<?php

namespace App\Services\Customer;

use App\Models\Customer;
use App\Services\AbstractService;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class CustomerService
 * @package App\Services\Customer
 */
class CustomerService extends AbstractService
{
    /**
     *
     * @param array $input 検索条件
     * @return LengthAwarePaginator ページネーターsearch
     */
    public function search(array $input): LengthAwarePaginator
    {
        $perPage = config('crud.app.per_page');

        if (empty($input)) {
            return Customer::paginate($perPage);
        }

        $query = Customer::query();

        if (!empty($input['last_kana'])) {
            $query->where('last_kana', 'like', '%' . $input['last_kana'] . '%');
        }
        if (!empty($input['first_kana'])) {
            $query->where('first_kana', 'like', '%' . $input['first_kana'] . '%');
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
     * 顧客取得
     * @param int $id
     * @return Customer
     */
    public function get(int $id): Customer
    {
        return Customer::findById($id);
    }

    /**
     * customersテーブルに登録/更新
     *
     * @param array $input データ
     * @param int|null $id 顧客ID
     */
    public function save(array $input, ?int $id = null): void
    {
        $model = null;
        if (empty($id)) {
            $model = new Customer();
        } else {
            $model = $this->get($id);
        }
        $model->fill($input)->save();
    }

    /**
     * customersテーブルから削除
     * @param int $id 顧客ID
     * @throws Exception
     */
    public function delete(int $id): void
    {
        $model = $this->get($id);
        if (!empty($model)) {
            $model->delete();
        }
    }
}
