<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_atendente = Role::where('name', 'atendente')->first();
        $role_paciente  = Role::where('name', 'paciente')->first();
        $role_especialista  = Role::where('name', 'especialista')->first();
        
        $atendente = new User();
        $atendente->name = 'Maria atendente';
        $atendente->email = 'atendente@hospital.com';
        $atendente->password = bcrypt('atendente');
        $atendente->foto = '32131321321321';
        $atendente->role = $role_atendente->id;
        $atendente->save();
        $atendente->roles()->attach($role_atendente);

        $paciente = new User();
        $paciente->name = 'João paciente';
        $paciente->email = 'paciente@hospital.com';
        $paciente->password = bcrypt('paciente');
        $paciente->foto = '32131321321321';
        $paciente->role = $role_paciente->id;
        $paciente->save();
        $paciente->roles()->attach($role_paciente);

        $especialista = new User();
        $especialista->name = 'Jackson especialista';
        $especialista->email = 'especialista@hospital.com';
        $especialista->password = bcrypt('especialista');
        $especialista->foto = '32131321321321';
        $especialista->role = $role_especialista->id;
        $especialista->save();
        $especialista->roles()->attach($role_especialista);

    }
}
