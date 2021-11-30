<?php

namespace Database\Seeders;

use App\Models\Docente;
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
        $user = User::factory()->create([
            'name' => 'Pablo',
            'email' => 'pvegav@autonoma.edu.pe',
            'password' => bcrypt('password'),
        ]);
        Docente::factory()->create(['username' => $user->name, 'user_id' => $user->id]);
        //LLAMA DOCENTESEEDER
        $this->call(DocenteSeeder::class);
        //LLAMA ESTUDIANTESEEDER
        $this->call(EstudianteSeeder::class);
        //LLAMA HorarioSeeder
        $this->call(HorarioSeeder::class);
    }
}
