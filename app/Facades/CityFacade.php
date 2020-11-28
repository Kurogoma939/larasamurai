<?php

/**
 * 市区町村ファサード
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 市区町村Facadeクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Facades
 */
class CityFacade extends Facade
{
    /**
     * Facadeのアクセサを取得します。
     *
     * @return string アクセサ
     */
    protected static function getFacadeAccessor()
    {
        return 'city';
    }
}
