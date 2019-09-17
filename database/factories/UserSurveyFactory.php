<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserSurvey;
use Faker\Generator as Faker;

$factory->define(UserSurvey::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'link' => Str::uuid()->toString(),
        'survey_id' => 1
    ];
});
