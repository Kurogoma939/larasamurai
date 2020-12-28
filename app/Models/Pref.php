<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Pref
 * @package App
 */
class Pref extends Model
{

    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function customer()
    {
        return $this->hasMany('App\Models\Customer');
    }

    /**
     * @return HasMany
     */
    public function city()
    {
        return $this->hasMany('App\Models\City');
    }
}
