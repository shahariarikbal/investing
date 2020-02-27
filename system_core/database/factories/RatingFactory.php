<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker, $params) {
    return [
        'member_id' => factory('App\Member')->create()->id,
        'rating' => rand(1,5),
        'rateable_type' => $params['rateable_type'],
        'rateable_id' => $params['rateable_id'],
        'body' => $faker->paragraph(5),

    ];
});
