<?php

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
     * 遅延処理defer（デフォルトはfalse)
     */
    protected $defer = true;

    /**
     * サービスプロバイダーの登録
     *
     * アプリケーション等の初期起動処理（ルーティングの設定など）を行う
     * シングルトン=>クラスのインスタンスは必ず一つだけと定義するもの。
     * サービスプロバイダーではシングルトンを使うと良い。
     * シングルトンは、クラスの依存関係を一時解除するもの。
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
