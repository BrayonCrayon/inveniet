<?php

use \App\User;
use Faker\Generator as Faker;
use \App\Attendee;
use \App\Event;
use \App\AttendeeType;
use \App\AttendeeStatus;

$factory->define(Attendee::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::all()->pluck('id')),
        'event_id' => $faker->randomElement(Event::all()->pluck('id')),
        'attendee_type_id' => $faker->randomElement(AttendeeType::all()->pluck('id')),
        'attendee_status_id' => $faker->randomElement(AttendeeStatus::all()->pluck('id')),

    ];
});
