<?php

use Faker\Generator as Faker;


$factory->define(App\Event::class, function (Faker $faker) {
    //TODO: FIND A WAY TO GET RANDOM DATES THAT DON'T HAVE SECONDS
    $startDate = $faker->dateTimeBetween(\Carbon\Carbon::now(), \Carbon\Carbon::now()->addMonths(8));
    return [
        'name'        => $faker->name . '\'s Event',
        'address'     => $faker->address,
        'latitude'    => $faker->latitude,
        'longitude'   => $faker->longitude,
        'description' => $faker->realText(),
        'starts_at'   => $startDate,
        'ends_at'     => $faker->dateTimeBetween($startDate, \Carbon\Carbon::parse($startDate)->addMonths(8)),
        'rsvp_by'   => \Carbon\Carbon::parse($startDate)->subWeek(),
    ];
});
