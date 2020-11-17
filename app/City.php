<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    protected $table = 'cities';

    public function customers()
    {
        return $this->belongsTo('App\Customer');
    }

    //外部キーの設定（モデル：親->子）
    public function prefs()
    {
        return $this->hasMany('App\Pref','foreign_key');
    }

}
