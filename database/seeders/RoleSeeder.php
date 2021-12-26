<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->description = "Admin";
        $role->save();

        $role1 = new Role();
        $role1->description = "Instructor";
        $role1->save();

        $role2 = new Role();
        $role2->description = "Funcionario";
        $role2->save();

        $role3 = new Role();
        $role3->description = "Atleta";
        $role3->save();

        $role4 = new Role();
        $role4->description = "Fisioterapia";
        $role4->save();

        $role5 = new Role();
        $role5->description = "Musculacion";
        $role5->save();

        $role6 = new Role();
        $role6->description = "Usuario Externo";
        $role6->save();

        $role7 = new Role();
        $role7->description = "Guarda Seguridad";
        $role7->save();
    }
}
