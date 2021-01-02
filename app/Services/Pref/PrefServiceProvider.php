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
     * @var bool
     * 初期起動処理のための遅延処理
     */
    protected $defer = true;

    /**
     *　初期起動処理
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
