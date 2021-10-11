<?php

namespace Database\Seeders;

use App\Models\Athlete;
use Illuminate\Database\Seeder;

class AthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $athlete = new Athlete();
        $athlete->user_id = 1;
        $athlete->sport_id = 1;
        $athlete->coach_id = 1;
        $athlete->state = 'P';
        $athlete->blood = "B+";
        $athlete->laterality = "D";
        $athlete->name_manager = "Pepito";
        $athlete->lastname_manager = "Salazar";
        $athlete->identification_manager = "123546";
        $athlete->birthdate_manager = '1999-12-04';
        $athlete->contact_manager = 0202153;
        $athlete->policy = "123456";


        $athlete->save();
    }
}
