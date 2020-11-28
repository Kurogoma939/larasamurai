<?php

/**
 * 顧客ファサード
 */
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 顧客Facadeクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Facades
 */
class CustomerFacade extends Facade
{
    /**
     * Facadeのアクセサを取得します。
     *
     * @return string アクセサ
     */
    protected static function getFacadeAccessor()
    {
        return 'customer';
    }
}
