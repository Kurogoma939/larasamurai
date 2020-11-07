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

    //今はこれでいいけど、現実だと数が多すぎる。だから実際は$guardedで変更不可なものだけ指定。
    //$guardedに直そうかな・・・
    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'last_kana',
        'first_kana',
        'gender',
        'birthday',
        'post_code',
        'pref_id',
        'address',
        'tel',
        'mobile',
        'email',
        'remarks',
    ];

    //外部キーの設定（モデル：親->子）
    public function prefs()
    {
        return $this->hasMany('App\Pref','foreign_key');
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




