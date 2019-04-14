<?php

use \App\User;
use Faker\Generator as Faker;
use \App\Attendee;
use \App\Event;
use \App\AttendeeType;

$factory->define(Attendee::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::all()->pluck('id')),
        'event_id' => $faker->randomElement(Event::all()->pluck('id')),
        'attendee_type_id' => $faker->randomElement(AttendeeType::all()->pluck('id')),

    ];
});
