<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(VacationSeeder::class);

        // Populate division_employee pivot table
        $divisions = App\Division::all();
        App\Employee::all()->each(function ($employee) use ($divisions) {
          $employee->divisions()->attach(
            $divisions->random(rand(1,3))->pluck('id')->toArray()
          );
        });
    }
}
