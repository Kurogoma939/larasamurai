<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    protected $table = 'prefs';

    //外部キーの設定->（子→親）
    public function customers()
    {
        return $this->belongsTo('App\Customer');
    }

    public function cities()
    {
        return $this->belongsTo('App\City');
    }
}
