<?php


namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class CustomerFacade
 * @package App\Facades
 *
 * Facadeクラスを継承することで、Requestクラスのインスタンスが使えるからこんなにすっきりしている。
 */
class CustomerFacade extends Facade
{
    /**
     * Facadeのアクセサを取得。
     *　
     * @return string アクセサ
     *　ファサードクラスには、このgetFacadeAccessor()だけ定義する。
     *  returnしたキーを元に、ファサードが使える。この場合Customer::(static)ができる。
     *  Facadeがstaticではなく、Facade内のCallstaticメソッドを呼ぶために必要。
     */
    protected static function getFacadeAccessor()
    {
        return 'customer';
    }
}
