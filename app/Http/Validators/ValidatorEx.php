<?php
/**
 * 拡張バリデータ
 */
namespace App\Http\Validators;

use App\Models\Customer;
use Illuminate\Validation\Validator;

/**
 * 拡張Validatorクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Http\Validation
 */
class ValidatorEx extends Validator
{
    /**
     * 入力された場合の数値を検証します。
     *
     * @param 属性 $attribute
     * @param 値 $value
     * @param パラメータ $parameters
     * @return bool 検証結果
     */
    public function validateUniqueEmail($attribute, $value, $parameters): bool
    {
        //入力されていない場合は検証しない
        if (empty($value)) {
            return true;
        }

        $query = Customer::where('email', '=', $value);

        $id = $this->getValue('id');
        if (!empty($id)) {
            $query->where('id', '!=', $id);
        }
        $result = $query->count();

        return ($result == 0);
    }
}
