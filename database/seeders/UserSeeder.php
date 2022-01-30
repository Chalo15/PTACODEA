<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'identification'  => 207630342,
                'password'        => Hash::make('12346'),
                'name'            => 'Josue',
                'last_name'       => 'Perez Sequeira',
                'birthdate'       => '1997-02-04',
                'phone'           => 86155929,
                'email'           => 'jdps0497@gmail.com',
                'province'        => 'Alajuela',
                'city'            => 'Grecia',
                'address'         => 'Grecia',
                'gender'          => 'Masculino',
                'contract_number' => '200',
                'contract_year'   => 2,
                'experience'      => 2
            ], [
                'role_id'         => 1,
                'identification'  => 240,
                'password'        => Hash::make('12346'),
                'name'            => 'Carlos',
                'last_name'       => 'Alpizar Gutierrez',
                'birthdate'       => '1999-04-21',
                'phone'           => 83451018,
                'email'           => 'carlos@gmail.com',
                'province'        => 'Alajuela',
                'city'            => 'Alajuela',
                'address'         => 'El Roble',
                'gender'          => 'Masculino',
                'contract_number' => '200000',
                'contract_year'   => 2,
                'experience'      => 2
            ]
        ];

        DB::table('users')->insert($users);
    }
}
