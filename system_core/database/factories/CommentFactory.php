<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker, $params) {
    return [
        'member_id' => factory('App\Member')->create()->id,
        'commentable_type' => $params['commentable_type'],
        'commentable_id' => $params['commentable_id'],
        'body' => $faker->paragraph(3),
    ];
});
