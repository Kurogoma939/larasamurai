<?php
/**
 * 市区町村サービス
 */
namespace App\Services\City;

use App\Models\City;
use App\Services\AbstractService;
use Illuminate\Support\Collection;

/**
 * 市区町村Serviceクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Services\City
 */
class CityService extends AbstractService
{
    /**
     * 市区町村リストを取得します。
     *
     * @param int $prefId 都道府県ID
     * @return Collection コレクション
     */
    public function getList(int $prefId): Collection
    {
        return City::where('pref_id', '=', $prefId)->get();
    }
}
