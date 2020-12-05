<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    $startDate = $faker->dateTimeBetween(Carbon::tomorrow(), Carbon::now()->addWeek());
    $endDate = $faker->dateTimeBetween($startDate, Carbon::now()->addWeek());

    return [
        'title' => ucfirst($faker->words($faker->numberBetween(1, 3), true)),
        'description' => $faker->paragraphs($faker->numberBetween(1, 5), true),
        'status' => 'Available',
        'start_date' => $startDate,
        'end_date' => $endDate,
        'created_at' => $faker->dateTimeBetween(Carbon::yesterday(), Carbon::now())
    ];
});
