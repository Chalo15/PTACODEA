<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['description' => 'Admin'],
            ['description' => 'Instructor'],
            ['description' => 'Funcionario'],
            ['description' => 'Atleta'],
            ['description' => 'Fisioterapia'],
            ['description' => 'Musculacion'],
            ['description' => 'Usuario Externo'],
            //['description' => 'Guarda Seguridad'],
        ];

        DB::table('roles')->insert($roles);
    }
}
