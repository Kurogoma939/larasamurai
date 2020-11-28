<?php
/**
 * 都道府県サービス
 */
namespace App\Services\Pref;

use App\Models\Pref;
use App\Services\AbstractService;
use Illuminate\Support\Collection;

/**
 * 都道府県Serviceクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Services\Pref
 */
class PrefService extends AbstractService
{
    /**
     * 都道府県リストを取得します。
     *
     * @return Collection コレクション
     */
    public function getList(): Collection
    {
        return Pref::all();
    }
}
