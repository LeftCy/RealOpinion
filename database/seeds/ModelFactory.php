<?php


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('testtest'),
        'remember_token' => chr(mt_rand(97, 122)).chr(mt_rand(97, 122)).chr(mt_rand(97, 122)),
    ];
});
