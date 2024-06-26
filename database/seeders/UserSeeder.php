<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$random = Str::random(10);
        Hash::make($random)*/
        $users = [
            [

                'role_id'         => 1,
                'identification'  => '207630342',
                'password'        => Hash::make('12346'),
                'name'            => 'Josue',
                'last_name'       => 'Perez Sequeira',
                'birthdate'       => '1997-02-04',
                'phone'           => 86155929,
                'email'           => 'jdps0497@gmail.com',
                'district'        => 'Alajuela',
                'canton'            => 'Grecia',
                'address'         => 'Grecia',
                'gender'          => 'M',
                'contract_number' => '200',
                'contract_year'   => 2,
                'experience'      => 2,
                'condition'      => 'A'
            ], [
                'role_id'         => 1,
                'identification'  => '207910178',
                'password'        => Hash::make('12346'),
                'name'            => 'Carlos',
                'last_name'       => 'Alpizar Gutierrez',
                'birthdate'       => '1999-04-21',
                'phone'           => 83451018,
                'email'           => 'carlos@gmail.com',
                'district'        => 'Alajuela',
                'canton'          => 'Alajuela',
                'address'         => 'El Roble',
                'gender'          => 'M',
                'contract_number' => '200000',
                'contract_year'   => 2,
                'experience'      => 2,
                'condition'       => 'A'
            ],
            [
                'role_id'         => 1,
                'identification'  => '702620492',
                'password'        => Hash::make('12346'),
                'name'            => 'Billy',
                'last_name'       => 'Chacon Serrano',
                'birthdate'       => '1998-08-17',
                'phone'           => 83451018,
                'email'           => 'bichacon98s@gmail.com',
                'district'        => 'Limon',
                'canton'          => 'Siquirres',
                'address'         => 'San Alberto',
                'gender'          => 'Masculino',
                'contract_number' => '200000',
                'contract_year'   => 2,
                'experience'      => 2,
                'condition'       =>'A'
            ]
        ];

        DB::table('users')->insert($users);
    }
}
