<?php

namespace App\Services\Pref;

use Illuminate\Support\ServiceProvider;

/**
 * Class PrefServiceProvider
 * @package App\Services\Pref
 */
class PrefServiceProvider extends ServiceProvider
{
    /**
     * 初期起動処理:registerメソッドの読み込み時間を管理する。
     * registerメソッドに書いてはいけない。
     */
    protected $defer = true;

    /**
     * アプリケーション等の初期起動処理（ルーティングの設定など）を行う
     * シングルトン=>クラスのインスタンスは必ず一つだけと定義するもの。
     * クラスの依存関係を一時解除するもの。
     */
    public function register()
    {
        $this->app->singleton('pref', function ($app) {
            return new PrefService($app);
        });
    }

    /**
     * 登録するサービスコンテナ結合名
     *
     * @return array
     */
    public function provides()
    {
        return ['pref'];
    }
}
