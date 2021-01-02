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
    protected $guarded = 'id';
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function customers()
    {
        return $this->hasMany('Customer');
    }

    /**
     * @return HasMany
     */
    public function cities()
    {
        return $this->hasMany('City');
    }
}
