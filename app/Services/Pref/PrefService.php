<?php

namespace App\Services\Pref;

use App\Models\Pref;
use App\Services\AbstractService;
use Illuminate\Support\Collection;

/**
 * Class PrefService
 * @package App\Services\Pref
 */
class PrefService extends AbstractService
{
    /**
     * ：Collectionって書くとコレクションとして取得？
     *
     */
    public function getList(): Collection
    {
        return Pref::all();
    }
}
