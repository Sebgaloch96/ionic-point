<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->text(),
        'created_at' => $faker->dateTimeBetween(Carbon::yesterday(), Carbon::now())
    ];
});
