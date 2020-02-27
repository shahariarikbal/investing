<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'support_department_id' => rand(1, 3),
        'subject' => $faker->word(),
        'issue' => $faker->sentence,
        'severity' => rand(1, 3),
        'member_id' => rand(1, 4000),
        'assign_to' => rand(1, 10),
        'status' => 0
    ];
});
