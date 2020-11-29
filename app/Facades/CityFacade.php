<?php


namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class CityFacade
 * @package App\Facades
 */
class CityFacade extends Facade
{
    /**
     * Facadeのアクセサを取得
     *
     * @return string アクセサ
     */
    protected static function getFacadeAccessor()
    {
        return 'city';
    }
}
