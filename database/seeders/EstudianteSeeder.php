<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Database\Seeder;

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
                //Crear Perfiles igual a la cantidad de usuarios existentes, 8+8=16----------------------------------------------------------
                $estudiante = Estudiante::factory()->create([
                    //Iguala el username de los docentes a name de los usuarios
                    'username' => $user->name,
                    //Iguala el id de los usuarios a user_id de los prefiles
                    'user_id' => $user->id,
                    'aula_id' => $aula->id
                ]);
            }
        }
    }
}
