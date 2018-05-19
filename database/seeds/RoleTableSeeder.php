<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'atendente';
        $role_employee->description = 'Perfil de atendente';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'paciente';
        $role_manager->description = 'Perfil de paciente';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'especialista';
        $role_manager->description = 'Perfil de especialista';
        $role_manager->save();

    }
}
