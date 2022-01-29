<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\User;
use App\Models\Docente;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREAR CURSO
        $cursos = Curso::factory(5)->create();
        foreach ($cursos as $curso) {
            //CREAR DOCENTES
            $users = User::factory(2)->create();
            foreach ($users as $user) {
                //Crear Perfiles igual a la cantidad de usuarios existentes
                $docente = Docente::factory()->create([
                    //Iguala el id de los usuarios a user_id de los prefiles
                    'user_id' => $user->id,
                ]);
                $docente->cursos()->sync(rand(1, 5), $docente->id);
                $user->assignRole('Docente'); // Returns only users with the role 'Docente'
            }
        }
    }
}
