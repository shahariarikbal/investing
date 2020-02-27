<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Blog::class, function (Faker $faker) {
    $title = $faker->sentence(6);
    return [
        'category_id' => rand(1,60),
        'title' => $title,
        'slug' => Str::slug($title, '-'),
        'body' => $faker->paragraph(5),
        'feature_image' => 'Tulips.jpg',
        'status' => 4,
        'created_by' => rand(1, 10)
    ];
});
