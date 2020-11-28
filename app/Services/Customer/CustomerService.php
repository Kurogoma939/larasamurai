<?php
/**
 * 顧客サービス
 */
namespace App\Services\Customer;

use App\Models\Customer;
use App\Services\AbstractService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * 顧客Serviceクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Services\Customer
 */
class CustomerService extends AbstractService
{
    /**
     * 顧客リストを取得します。
     *
     * @param array $input 検索条件
     * @return LengthAwarePaginator ページネーター
     */
    public function getList(array $input): LengthAwarePaginator
    {
        if (empty($input)) {
            return Customer::paginate(config('crud.app.default.limit'));
        }

        $query = Customer::query();

        //姓かなを部分一致で検索します
        if (!empty($input['last_kana'])) {
            $query = $query->where('last_kana', 'LIKE', '%' . $input['last_kana'] . '%');
        }

        //名かなを部分一致で検索します
        if (!empty($input['first_kana'])) {
            $query = $query->where('first_kana', 'LIKE', '%' . $input['first_kana'] . '%');
        }

        //性別で検索します
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

        //都道府県で検索します
        if (!empty($input['pref_id'])) {
            $query = $query->where('pref_id', '=', $input['pref_id']);
        }

        return $query->paginate(config('crud.app.default.limit'));
    }

    /**
     * 顧客を取得します。
     *
     * @param int $id 顧客ID
     * @return Customer 顧客モデル
     */
    public function get(int $id): Customer
    {
        return Customer::findById($id);
    }

    /**
     * 顧客を登録/更新します。
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
     * 顧客を削除します。
     *
     * @param int $id 顧客ID
     */
    public function delete(int $id): void
    {
        $model = $this->get($id);
        if (!empty($model)) {
            $model->delete();
        }
    }

    /**
     * メールアドレスが未登録か確認します。
     *
     * @param string $email メールアドレス
     * @param int|null $id 顧客ID
     * @return bool メールアドレスが未登録の場合 true を返します
     */
    public function isUniqueEmail(string $email, ?int $id): bool
    {
        $query = Customer::where('email', '=', $email);

        if (!empty($id)) {
            $query->where('id', '!=', $id);
        }
        $result = $query->count();

        return ($result == 0);
    }
}
