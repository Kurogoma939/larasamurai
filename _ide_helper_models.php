<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Customer
 *
 * @property int $id ID
 * @property string $last_name 姓
 * @property string $first_name 名
 * @property string $last_kana 姓かな
 * @property string $first_kana 名かな
 * @property int $gender 性別
 * @property string $birthday 生年月日
 * @property string $post_code 郵便番号
 * @property int $pref_id 都道府県ID
 * @property string $address 住所
 * @property string|null $building 建物名
 * @property string $tel 電話番号
 * @property string $mobile 携帯番号
 * @property string $email メールアドレス
 * @property string $remarks 備考
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereFirstKana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereLastKana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePrefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App{
/**
 * App\Pref
 *
 * @property int $id ID
 * @property string $name 都道府県名
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref whereUpdatedAt($value)
 */
	class Pref extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

