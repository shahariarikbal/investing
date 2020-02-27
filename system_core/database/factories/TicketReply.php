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

$factory->define(TicketReply::class, function (Faker $faker) {
    return [
        'ticket_id' => rand(1, 100),
        'message' => $faker->sentence,
        'user_id' => rand(1, 10),
        'user_type' => 0
    ];
});
