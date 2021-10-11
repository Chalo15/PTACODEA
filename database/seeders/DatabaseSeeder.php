<?php

namespace Database\Seeders;

use App\Models\Sport;
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
        /*\App\Models\Role::factory(2)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Sport::factory(4)->create();
        \App\Models\Coach::factory(4)->create();
        \App\Models\Athlete::factory(5)->create();*/
        $this->call(RoleSeeder::class);
        $this->call(SportSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CoachSeeder::class);
        $this->call(AthleteSeeder::class);
    }
}
