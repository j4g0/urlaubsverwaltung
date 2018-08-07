<?php

use Illuminate\Database\Seeder;

class AbsenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\AbsenceType::class, 5)->create();
    }
}
