<?php

namespace App\Services\City;

use App\Models\City;
use App\Services\AbstractService;
use Illuminate\Support\Collection;

/**
 * Class CityService
 * @package App\Services\City
 */
class CityService extends AbstractService
{

    /**
     * 市町村の取得
     * @param int $prefId
     * @return Collection
     */
    public function getList(int $prefId): Collection
    {
        return City::where('pref_id', '=', $prefId)->get();
    }
}
