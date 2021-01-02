<?php

namespace App\Services;

use Illuminate\Foundation\Application;

/**
 * 宣言だけして、処理の内容を定義しない抽象メソッド。
 * 依存度が低くなるため、テスト等がしやすくなる（独立性が高い）。
 *
 * Class AbstractService
 * @package App\Services
 */
abstract class AbstractService
{

    protected $app = null;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}
