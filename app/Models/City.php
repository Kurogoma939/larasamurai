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
