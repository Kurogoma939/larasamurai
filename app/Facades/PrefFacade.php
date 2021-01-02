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
     * @return string アクセサ
     */
    protected static function getFacadeAccessor()
    {
        return 'pref';
    }
}
