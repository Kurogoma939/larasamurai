<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    protected $table = 'prefs';

    //外部キーの設定->（子→親）
    public function prefs()
    {
        return $this->belongsTo('App\Customer');
    }
}
