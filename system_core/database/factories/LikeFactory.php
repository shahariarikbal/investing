<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker, $params) {
    return [
        'member_id' => factory('App\Member')->create()->id,
        'likeable_type' => $params['likeable_type'],
        'likeable_id' => $params['likeable_id'],
    ];
});
