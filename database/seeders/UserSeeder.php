<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id'         => 1,
                'identification'  => 240,
                'password'        => '12346',
                'name'            => 'Josue',
                'last_name'       => 'Perez Sequeira',
                'birthdate'       => '1999-04-21',
                'phone'           => 4555,
                'email'           => '555@gmail.com',
                'province'        => 'Alajuela',
                'city'            => 'Alajuela',
                'address'         => 'El Roble',
                'gender'          => 'M',
                'contract_number' => '200000',
                'contract_year'   => 2,
                'experience'      => 2
            ]
        ];

        DB::table('users')->insert($users);
    }
}
