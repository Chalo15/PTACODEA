<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coaches = [
            [
                'user_id'  => 1,
                'sport_id' => 2,
                'phone'    => 86774667
            ],
        ];

        DB::table('coaches')->insert($coaches);
    }
}
