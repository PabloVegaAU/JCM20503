<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\User;
use Prophecy\Call\Call;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        //LLAMA RoleSeeder
        $this->call(RoleSeeder::class);

        $user = User::factory()->create([
            'name' => 'Pablo',
            'email' => 'pvegav@autonoma.edu.pe',
            'password' => bcrypt('password'),
        ])->assignRole('Admin');
        /* Docente::factory()->create(['user_id' => $user->id, 'nombres' => $user->name, 'apellidos' => 'Vega Valverde']); */

        //LLAMA DOCENTESEEDER
        $this->call(DocenteSeeder::class);

        //LLAMA ESTUDIANTESEEDER
        $this->call(EstudianteSeeder::class);
        //LLAMA HorarioSeeder
        $this->call(HorarioSeeder::class);
    }
}
