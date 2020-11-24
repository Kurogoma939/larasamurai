<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class City
 * @package App
 */
class City extends Model
{
    protected $guarded = 'id';
    protected $dates = ['birthday', 'created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

    /**
     * @return BelongsTo
     */
    public function prefs()
    {
        return $this->belongsTo('App\Pref', 'city_id', 'id');
    }
}
