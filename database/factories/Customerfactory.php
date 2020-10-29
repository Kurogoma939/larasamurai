<?php

use Faker\Generator as Faker;
use App\Customer;


//とりあえず入れない。
$factory->define(Customer::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'first_name' => $faker->firstName,
        'birthday' => $faker->dateTimeThisCentury,
        'post_code' => $faker->postcode,
        'address' => $faker->address,
        'tel' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->email,
        'remarks' => $faker->sentence,
        'created_at' => $faker->dateTimeThisMonth,
        'updated_at' => $faker->dateTimeThisMonth,
    ];
});
