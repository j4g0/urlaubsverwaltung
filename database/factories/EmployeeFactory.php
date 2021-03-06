<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
      'first_name'    => $faker->firstName,
      'last_name'     => $faker->lastName,
      'vacation_days' => $faker->numberBetween(26,30)
    ];
});
