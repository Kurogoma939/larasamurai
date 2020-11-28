<?php
/**
 * 都道府県サービスプロバイダー
 */
namespace App\Services\Pref;

use Illuminate\Support\ServiceProvider;

/**
 * 都道府県ServiceProviderクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Services\Pref
 */
class PrefServiceProvider extends ServiceProvider
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
        $this->app->singleton('pref', function ($app) {
            return new PrefService($app);
        });
    }

    /**
     * 遅延プロバイダーのサービスコンテナ結合名
     *
     * @return array
     */
    public function provides()
    {
        return ['pref'];
    }
}
