<?php

namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(SportSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CoachSeeder::class);
        //$this->call(AthleteSeeder::class);
    }
}
