<?php
/**
 * 顧客サービスプロバイダー
 */
namespace App\Services\Customer;

use Illuminate\Support\ServiceProvider;

/**
 * 顧客ServiceProviderクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Services\Customer
 */
class CustomerServiceProvider extends ServiceProvider
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
        $this->app->singleton('customer', function ($app) {
            return new CustomerService($app);
        });
    }

    /**
     * 遅延プロバイダーのサービスコンテナ結合名
     *
     * @return array
     */
    public function provides()
    {
        return ['customer'];
    }
}
