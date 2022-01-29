<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREAR AULA
        $aulas = Aula::factory(5)->create();
        foreach ($aulas as $aula) {
            $users = User::factory(5)->create();
            foreach ($users as $user) {
                //Crear Perfiles igual a la cantidad de usuarios existentes
                $estudiante = Estudiante::factory()->create([
                    //Iguala el id de los usuarios a user_id de los prefiles
                    'user_id' => $user->id,
                    'aula_id' => $aula->id
                ]);
                $user->assignRole('Estudiante'); // Returns only users with the role 'Estudiante'
            }
        }
    }
}
