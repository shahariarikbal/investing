<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Package;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    $title = $faker->sentence(6);
    return [
        'public_id' => Str::random(40),
        'title' => $title,
        'service' => 'App\General',
        'duration' => 0,
        'price' => 5200,
        'details' => $faker->paragraph(3),
        'status' => 1,
        'icon' => 'edit',
        'created_by' => rand(1, 5)
    ];
});
