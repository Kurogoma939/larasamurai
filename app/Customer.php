<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Pref;

class Customer extends Model
{
    //こっちでも主キー副キーの設定をしてあげないとあげない。belongs使って。多対多のララ帳のやつ！

    protected $table = 'customers';

    //日付の設定（Carbon?Mutator?)

    protected $dateFormat = 'Y-m-d';

    //今はこれでいいけど、現実だと数が多すぎる。だから実際は$guardedで変更不可なものだけ指定。
    protected $fillable = [
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


}
