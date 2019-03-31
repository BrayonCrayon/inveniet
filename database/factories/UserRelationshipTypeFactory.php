<?php

use Faker\Generator as Faker;

$factory->define(\App\UserRelationshipType::class, function (Faker $faker) {
    return [
        'relationship_type' => $faker->sentence(1)
    ];
});
