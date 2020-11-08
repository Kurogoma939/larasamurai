<?php
/**
 * 入力値バリデータのサービスプロバイダ
 */
namespace App\Providers;

use App\Http\Validators\ValidatorEx;
use Illuminate\Support\ServiceProvider;

/**
 * 入力値バリデータServiceProviderクラスです。
 *
 * @author Satoshi Nagashiba <bobtabo.buhibuhi@gmail.com>
 * @package App\Providers;
 */
class ValidatorExServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $customAttributes) {
            return new ValidatorEx($translator, $data, $rules, $messages, $customAttributes);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
