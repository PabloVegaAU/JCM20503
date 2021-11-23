<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'name' => 'Pablo',
            'email' => 'pvegav@autonoma.edu.pe',
            'password' => bcrypt('password'),
        ]);
        //LLAMA DOCENTESEEDER
        $this->call(DocenteSeeder::class);
        //LLAMA ESTUDIANTESEEDER
        $this->call(EstudianteSeeder::class);
        //LLAMA HorarioSeeder
        $this->call(HorarioSeeder::class);
    }
}
