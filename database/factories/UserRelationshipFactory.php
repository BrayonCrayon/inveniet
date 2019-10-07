<?php

use App\Models\RelationshipStatus;
use App\Models\User;
use App\Models\UserRelationship;
use App\Models\UserRelationshipType;
use Faker\Generator as Faker;

$factory->define(UserRelationship::class, function (Faker $faker) {
    $userId = $faker->randomElement(User::all()->pluck('id'));
    return [
        'user_id'                   => $userId,
        'related_user_id'           => $faker->randomElement(User::where('id', '!=', $userId)->get()),
        'user_relationship_type_id' => $faker->randomElement(UserRelationshipType::all()->pluck('id')),
        'relationship_status_id'    => $faker->randomElement(RelationshipStatus::all()->pluck('id')),
    ];
});
