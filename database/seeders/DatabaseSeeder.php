<?php

namespace Database\Seeders;

use App\Models\Role;
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
                \App\Models\Role::factory(3)->create();
                \App\Models\User::factory(1000)->create();
                \App\Models\Sport::factory(30)->create();
                \App\Models\Coach::factory(2)->create();
                \App\Models\Athlete::factory(1)->create();

                /*$this->call(RoleSeeder::class);
        $this->call(SportSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CoachSeeder::class);
        //$this->call(AthleteSeeder::class);*/
        }
}
