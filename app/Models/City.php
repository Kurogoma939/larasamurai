<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class City
 * @package App
 * @method static getList(\Illuminate\Routing\Route|object|string $pref_id)
 */
class City extends Model
{

    protected $dates = ['created_at', 'updated_at'];


    /**
     * @return BelongsTo
     */
    public function customer()
    {

        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return BelongsTo
     */
    public function pref()
    {
        return $this->belongsTo('App\Models\Pref');
    }
}
