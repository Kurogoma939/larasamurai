<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Pref;
use Carbon\Carbon;

class Customer extends Model
{
    //こっちでも主キー副キーの設定をしてあげないとあげない。belongs使って。多対多のララ帳のやつ！

    protected $table = 'customers';

    protected $guarded = 'id';

    //外部キーの設定（モデル：親->子）
    public function prefs()
    {
        return $this->hasMany('App\Pref','foreign_key');
    }

    //外部キーの設定（モデル：親->子）
    public function cities()
    {
        return $this->hasMany('App\City','foreign_key');
    }

    /**
    * 都道府県の名前を取得
    *
    * @param string $value
    * @return string
    */

    public function getPrefecturesAttribute($value)
    {
        return Pref::find($this->pref_id)->name;
    }

    /**
     * 都道府県の名前を取得
     *
     * @param string $value
     * @return string
     */

    public function getCitiesAttribute($value)
    {
        return City::find($this->city_id)->name;
    }

    /**
    * 誕生日のカーボン表記
    *
    * @param string $value
    * @return string
    */

    public function getBirthdayAttribute($value)
    {
        $carbon = new Carbon($value);

        return $carbon->format('Y/m/d');

    }

}




