<?php

namespace Database\Seeders;

//use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $role = Role::create(['name'=>'Admin']);

        $role1 = Role::create(['name'=>'Instructor']);

        $role2 = Role::create(['name'=>'Atleta']);

        $role3 = Role::create(['name'=>'Fisioterapia']);

        $role4 = Role::create(['name'=>'Musculacion']);

        $role5 = Role::create(['name'=>'Usuario Externo']);

        //SuperAdministrador
        Permission::create(['name'=>'athletes']);

        Permission::create(['name'=>'athletes.guardado']);

        Permission::create(['name'=>'coach_interface.blade']);

        Permission::create(['name'=>'datosatletas']);

        Permission::create(['name'=>'athlete_Res']);

        Permission::create(['name'=>'athlete_delete']);

        Permission::create(['name'=>'athlete_accepted']);

        Permission::create(['name'=>'practicas']);

        Permission::create(['name'=>'athletes_index']);

        Permission::create(['name'=>'athletes.add']);

        Permission::create(['name'=>'instructor.practica']);

        Permission::create(['name'=>'funcionarios.guardarFuncionario']);

        Permission::create(['name'=>'funcionarios']);

        Permission::create(['name'=>'coach.guardarCoach']);

        Permission::create(['name'=>'coaches']);

    }
}
