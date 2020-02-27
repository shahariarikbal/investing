<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker, $params) {
    $name = $faker->word . '_' . Str::random(3);
    return [
        'parent_id' => array_key_exists('parent_id', $params) ? $params['parent_id'] : null,
        'name' => $name,
        'slug' => Str::slug($name, '-'),
        'service' => $params['service'],
    ];
});
