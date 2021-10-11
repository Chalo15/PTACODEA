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
        $role2->description = "Atleta";
        $role2->save();

        $role3 = new Role();
        $role3->description = "Fisioterapia";
        $role3->save();

        $role4 = new Role();
        $role4->description = "Musculacion";
        $role4->save();
    }
}
