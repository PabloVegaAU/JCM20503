<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ncurso' => $this->faker->unique()->randomElement(['Matematica', 'Psicologia', 'Biologia', 'Religion', 'Comunicacion']),
            'nclases' => $this->faker->randomDigit(1, 5),
            'año' => $this->faker->randomElement(['2021', '2022'])
        ];
    }
}
