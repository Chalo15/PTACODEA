<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $athletes = [
            [
                'user_id'                => 1,
                'sport_id'               => 1,
                'coach_id'               => 1,
                'state'                  => 'P',
                'blood'                  => 'B+',
                'laterality'             => 'D',
                'name_manager'           => 'Pepito',
                'lastname_manager'       => 'Salazar',
                'manager'                => 'Padre',
                'identification_manager' => '123546',
                'birthdate_manager'      => '1999-12-04',
                'contact_manager'        => 0202153,
                'policy'                 => '123456'
            ]
        ];

        DB::table('athletes')->insert($athletes);
    }
}
