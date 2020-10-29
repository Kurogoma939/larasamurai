<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

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

}
