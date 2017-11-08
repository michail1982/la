<?php

use Faker\Generator as Faker;

$factory->define(App\Models\EntityField::class, function (Faker $faker) {
    return [
        'title' => $faker->city
    ];
});
