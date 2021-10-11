<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->role_id = 2;
        $user->identification = 20;
        $user->password = "12346";
        $user->name = "Josue";
        $user->lastname = "Perez Sequeira";
        $user->birthdate = '1999-04-21';
        $user->phone = 4555;
        $user->email = "555@hotmail.com";
        $user->province = "Alajuela";
        $user->city = "Alajuela";
        $user->address = "El Roble";
        $user->gender = 'M';

        $user->save();
    }
}
