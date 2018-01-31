<?php

use Faker\Generator as Faker;

$factory->define(\App\Review::class, function (Faker $faker) {
    return [
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        'review' => $faker->text($maxNbChars = 500),
        'fundraiser_id' => function () {
            return factory('App\Fundraiser')->create()->id;
        },
        'reviewer_id' => function () {
            return factory('App\Reviewer')->create()->id;
        },
    ];
});