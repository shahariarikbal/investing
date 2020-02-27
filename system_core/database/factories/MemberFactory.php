<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Member;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Member::class, function (Faker $faker) {
    $email = $faker->unique()->safeEmail();
    $username = explode('@', $email)[0];

    $firstname = $username;
    $lastname = rand(1, 9);

    if (stristr($username, '.')) {
        $names = explode('.',$username);
        $firstname = $names[0];
        $lastname = $names[1];
    }
    return [
        'username' => $username . rand(1, 99),
        'email' => $email,
        'first_name' => $firstname,
        'last_name' => $lastname,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        'remember_token' => Str::random(10),
    ];
});
