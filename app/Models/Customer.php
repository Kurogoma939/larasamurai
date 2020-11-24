<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Routing\Route;

/**
 * Class Customer
 * @package App
 * @method static where(string $string, string $string1, Route|object|string $id)
 */
class Customer extends Model
{

    protected $guarded = 'id';
    protected $dates = ['birthday', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function prefs()
    {
        return $this->belongsTo('Pref', 'pref_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function cities()
    {
        return $this->belongsTo('City', 'city_id', 'id');
    }

    /**
     * 都道府県の名前を取得
     *
     * @return string
     */

    public function getPrefecturesAttribute()
    {
        return Pref::find($this->pref_id)->name;
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
