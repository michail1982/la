<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Entity::class, function (Faker $faker) {
    $typeIdx = \App\Models\EntityType::get(['id'])->pluck('id');
    return [
        'title' => $faker->address,
        'type_id' => $typeIdx->count()?$typeIdx->random():null
    ];
});
