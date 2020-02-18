<?php

use App\Models\Event;
use App\Models\RepeatedType;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(Event::class, function (Faker $faker) {
    $startDate = $faker->dateTimeBetween(Carbon::now(), Carbon::now()->addMonths(8));
    $endDate = $faker->dateTimeBetween($startDate, Carbon::parse($startDate)->addMonths(8));
    $isRepeated = $faker->boolean();
    return [
        'name' => $faker->name . '\'s Event',
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'description' => $faker->realText(),
        'starts_at' => $startDate,
        'ends_at' => $endDate,
        'rsvp_by' => Carbon::parse($startDate)->subWeek(),
        'repeated' => $isRepeated,
        'repeated_type_id' => $isRepeated ? $faker->randomElement(RepeatedType::all()->pluck('id')) : null,
    ];
});
