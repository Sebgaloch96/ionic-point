<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

$factory->define(Address::class, function () {
    $faker = FakerFactory::create('en_GB');

    return [
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => '',
        'address_line_3' => '',
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
        'lat' => $faker->latitude(51, 54),
        'lng' => $faker->longitude(-2, 0)
    ];
});
