<?php

namespace Database\Seeders;

use App\Models\Coach;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coach = new Coach();
        $coach->user_id = 2;
        $coach->sport_id = 1;
        $coach->save();

        $coach1 = new Coach();
        $coach1->user_id = 7;
        $coach1->sport_id = 2;
        $coach1->save();

        $coach2 = new Coach();
        $coach2->user_id = 8;
        $coach2->sport_id = 3;
        $coach2->save();
    }
}
