<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $user->contract_number = "200000";
        $user->contract_year = 2;
        $user->experience = 2;
        $user->save();

        $user1 = new User();
        $user1->role_id = 1;
        $user1->identification = 240;
        $user1->password = Hash::make("12346");
        $user1->name = "Josue";
        $user1->lastname = "Perez Sequeira";
        $user1->birthdate = '1999-04-21';
        $user1->phone = 45555;
        $user1->email = "5554@hotmail.com";
        $user1->province = "Alajuela";
        $user1->city = "Alajuela";
        $user1->address = "El Roble";
        $user1->gender = 'M';
        $user1->contract_number = "200000";
        $user1->contract_year = 2;
        $user1->experience = 2;
        $user1->save();
    }
}
