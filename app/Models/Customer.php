<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Routing\Route;

/**
 * Class Customer
 * @package App
 * @method static where(string $string, string $string1, Route|object|string $id)
 * @method static paginate(\Illuminate\Config\Repository|\Illuminate\Foundation\Application $per_page)
 */
class Customer extends Model
{
    use SoftDeletes;

    protected $guarded = 'id';

    protected $dates = ['birthday', 'created_at', 'updated_at','deleted_at'];

    /**
     * @return BelongsTo
     */
    public function pref()
    {
<<<<<<< HEAD
        return $this->belongsTo('App\Models\Pref');
=======
        return $this->belongsTo('Pref');
>>>>>>> develop3
    }

    /**
     * @return BelongsTo
     */
    public function city()
    {
<<<<<<< HEAD
        return $this->belongsTo('App\Models\City');
=======
        return $this->belongsTo('City');
>>>>>>> develop3
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
