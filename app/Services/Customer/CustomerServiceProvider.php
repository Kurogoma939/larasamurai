<?php
/**
 * 顧客サービスプロバイダー
 */
namespace App\Services\Customer;

use Illuminate\Support\ServiceProvider;

/**
 * Class CustomerServiceProvider
 * @package App\Services\Customer
 */
class CustomerServiceProvider extends ServiceProvider
{
    /**
     * 登録するための待ち時間処理
     * ローディング待機の設定
     */
    protected $defer = true;

    /**
     * サービスプロバイダーの登録
     */
    public function register()
    {
        $this->app->singleton('customer', function ($app) {
            return new CustomerService($app);
        });
    }

    /**
     * 登録するサービスコンテナ結合名
     * @return array
     * プロバイダにより提供されるサービスのこと。
     */
    public function provides()
    {
        return ['customer'];
    }
}
