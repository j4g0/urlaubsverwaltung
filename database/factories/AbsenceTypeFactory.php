<?php

use Faker\Generator as Faker;

$factory->define(App\AbsenceType::class, function (Faker $faker) {
    return [
      'name' => $faker->word
    ];
});
