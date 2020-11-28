<?php
/**
 * 都道府県ファサード
 */
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 都道府県Facadeクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Facades
 */
class PrefFacade extends Facade
{
    /**
     * Facadeのアクセサを取得します。
     *
     * @return string アクセサ
     */
    protected static function getFacadeAccessor()
    {
        return 'pref';
    }
}
