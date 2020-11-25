<?php

use Faker\Generator as Faker;
use App\Models\Customer;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstName,
        'last_kana' => $faker->lastName,
        'first_kana' => $faker->firstName,
        'gender' => $faker->randomElement(['1', '2']),
        'birthday' => $faker->dateTimeThisCentury,
        'post_code' => $faker->postcode,
        'pref_id' => $faker->numberBetween($min=1, $max=47),
        'city_id' => $faker->numberBetween($min=1, $max=141),
        'address' => $faker->address,
        'tel' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'remarks' => $faker->sentence,
        'created_at' => $faker->dateTimeThisMonth,
        'updated_at' => $faker->dateTimeThisMonth,
    ];
});
