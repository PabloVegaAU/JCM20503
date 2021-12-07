<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aulas = Aula::all();
        foreach ($aulas as $aula) {
            Horario::factory()->create([
                'aula_id' => $aula->id,
                'curso_id' => rand(1,5),
                'docente_id' => rand(1,5),
            ]);
        }
    }
}
