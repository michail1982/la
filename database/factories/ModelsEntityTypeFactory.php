<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EntityType::class, function (Faker $faker) {
    return [
        'title' => $faker->state
    ];
});
