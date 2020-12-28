<?php

namespace App\Models;

use Illuminate\Config\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Route;

/**
 * Class Customer
 * @package App
 * @method static where(string $string, string $string1, Route|object|string $id)
 * @method static paginate(Repository|Application $per_page)
 */
class Customer extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['birthday', 'created_at', 'updated_at','deleted_at'];

    /**
     * @return BelongsTo
     */
    public function pref()
    {
        return $this->belongsTo('App\Models\Pref');
    }

    /**
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * 市区町村の名前を取得
     *
     * @return string
     */
    public function getCitiesAttribute()
    {
        return City::find($this->city_id)->name;
    }
}
