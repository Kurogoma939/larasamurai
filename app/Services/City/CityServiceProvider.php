<?php
/**
 * 市区町村サービスプロバイダー
 */
namespace App\Services\City;

use Illuminate\Support\ServiceProvider;

/**
 * 市区町村ServiceProviderクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Services\City
 */
class CityServiceProvider extends ServiceProvider
{
    /**
     * 遅延プロバイダー
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * サービスプロバイダーの登録
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('city', function ($app) {
            return new CityService($app);
        });
    }

    /**
     * 遅延プロバイダーのサービスコンテナ結合名
     *
     * @return array
     */
    public function provides()
    {
        return ['city'];
    }
}
