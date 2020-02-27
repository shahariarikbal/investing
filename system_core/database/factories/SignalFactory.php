<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Signal;
use Faker\Generator as Faker;
// use Faker\Provider\DateTime;

$factory->define(Signal::class, function (Faker $faker) {
    $datetime = $faker->dateTimeBetween('-3 years', 'now');
    return [
        'category_id' => 49,
        'currency_id' => rand(1, 14),
        'type' => rand(1, 6),
        'signal_time' => $datetime,
        'price' => rand(10, 100),
        'take_profit' => rand(10, 100),
        'stop_loss'=> rand(10, 100),
        'status' => 'filled',
        'pips' => rand(3, 30),
        'profit' => rand(0, 1),
        'premium' => rand(0, 1),
        'created_at' => $datetime,
        'updated_at' => $datetime,
    ];
});
