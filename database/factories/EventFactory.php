<?php

use App\RepeatedType;
use Faker\Generator as Faker;


$factory->define(App\Event::class, function (Faker $faker) {
    $startDate = $faker->dateTimeBetween(\Carbon\Carbon::now(), \Carbon\Carbon::now()->addMonths(8));
    $isRepeated = $faker->boolean();
    return [
        'name' => $faker->name . '\'s Event',
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'description' => $faker->realText(),
        'starts_at' => $startDate,
        'ends_at' => $faker->dateTimeBetween($startDate, \Carbon\Carbon::parse($startDate)->addMonths(8)),
        'rsvp_by' => \Carbon\Carbon::parse($startDate)->subWeek(),
        'repeated' => $isRepeated,
        'repeated_type_id' => $isRepeated ? $faker->randomElement(RepeatedType::all()->pluck('id')) : null,
    ];
});
