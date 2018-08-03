<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Vacation::class, function (Faker $faker) {
  // Generate vacation start and end date
  $year = rand(2016, 2018);
  $month = rand(1,12);
  $day = rand(1,28);

  $date = Carbon::create($year, $month, $day, 0 ,0 ,0);

    return [
      'from'        => $date->format('Y-m-d H:i:s'),
      'to'          => $date->AddWeeks(rand(1,3))->format('Y-m-d H:i:s'),
      'employee_id' => $faker->numberBetween(1,50)
    ];
});
