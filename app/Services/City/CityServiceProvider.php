<?php

namespace App\Services\City;

use Illuminate\Support\ServiceProvider;

/**
 * Class CityServiceProvider
 * @package App\Services\City
 */
class CityServiceProvider extends ServiceProvider
{
    /**
     * 遅延処理defer（デフォルトはfalse)
     */
    protected $defer = true;

    /**
     * サービスプロバイダーの登録
     * @return void
     */
    public function register()
    {
        $this->app->singleton('city', function ($app) {
            return new CityService($app);
        });
    }

    /**
     * サービスコンテナ結合
     * @return array
     */
    public function provides()
    {
        return ['city'];
    }
}
