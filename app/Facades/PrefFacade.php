<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class PrefFacade
 * @package App\Facades
 */
class PrefFacade extends Facade
{
    /**
     * アクセサ->取得したデータを加工する物
     * Attribute()ではないのか、違いはあるのか？
     * AttributeとgetAccessorの併用は厳禁
     * @return string アクセサ
     */
    protected static function getFacadeAccessor()
    {
        return 'pref';
    }
}
